<?php

namespace App\Livewire\Sales;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Sale;
use App\Models\Outlet;
use App\Models\Item;
use App\Models\Price;
use Carbon\Carbon;

class Index extends Component
{
    use WithPagination;

    public $isOpen = false;
    public $saleId;
    public $date;
    public $outletId;
    public $paid = 0;
    public $paidoff = 0;
    public $notes = '';
    public $items = [];
    public $outlets;
    public $sales = [];
    
    public $totalQuantity, $totalSold, $total;
    
    protected $rules = [
        'date' => 'required|date',
        'outletId' => 'required|exists:outlets,id',
        'items.*.quantity' => 'required|numeric|min:0',
        'items.*.sold' => 'required|numeric|min:0',
        'items.*.price' => 'required|numeric|min:0',
        'paid' => 'required|numeric|min:0',
        'paidoff' => 'boolean',
        'notes' => 'nullable|string',
    ];

    public function mount()
    {
        $this->outlets = Outlet::all();
        $this->items = Item::all()->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'quantity' => 0,
                'sold' => 0,
                'price' => 0,
                'subtotal' => 0,
            ];
        })->toArray();
//        dd($this->items);
    }

    public function render()
    {
        $sales = Sale::with('details', 'outlet')->paginate(10);
        return view('livewire.sales.index', compact('sales', ));
    }

    public function openModal($saleId = null)
    {
        $this->reset(['date', 'outletId', 'paid', 'paidoff', 'notes', 'items']);
        if ($saleId) {
            $sale = Sale::with('details')->find($saleId);
            $this->saleId = $sale->id;
            $this->date = $sale->date;
            $this->outletId = $sale->outlet_id;
            $this->paid = $sale->paid;
            $this->paidoff = $sale->paidoff;
            $this->notes = $sale->notes;
            foreach ($sale->details as $detail) {
                $this->items[$detail->item_id] = [
                    'id' => $detail->item_id,
                    'name' => $detail->item->name,
                    'quantity' => $detail->quantity,
                    'sold' => $detail->sold,
                    'price' => $detail->price,
                    'subtotal' => $detail->total,
                ];
            }
        }
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }
    
    public function checkIsExist(){
        
    }

    public function calculateSubtotal($index)
    {
        $this->items[$index]['subtotal'] = $this->items[$index]['sold'] * $this->items[$index]['price'];
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $this->totalQuantity = array_sum(array_column($this->items, 'quantity'));
        $this->totalSold = array_sum(array_column($this->items, 'sold'));
        $this->total = array_sum(array_column($this->items, 'subtotal'));
    }

    public function save()
    {
        $this->validate();

        if ($this->saleId) {
            $sale = Sale::find($this->saleId);
            $sale->update([
                'date' => $this->date,
                'outlet_id' => $this->outletId,
                'total' => $this->total,
                'paid' => $this->paid,
                'paidoff' => $this->paidoff,
                'notes' => $this->notes,
            ]);
            $sale->details()->delete();
        } else {
            $sale = Sale::create([
                'date' => $this->date,
                'outlet_id' => $this->outletId,
                'total' => $this->total,
                'paid' => $this->paid,
                'paidoff' => $this->paidoff,
                'notes' => $this->notes,
            ]);
        }

        foreach ($this->items as $item) {
            if ($item['quantity'] > 0 && $item['sold'] > 0) {
                $sale->details()->create([
                    'item_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'sold' => $item['sold'],
                    'price' => $item['price'],
                    'total' => $item['subtotal'],
                ]);
            }
        }

        $this->closeModal();
        session()->flash('message', 'Penjualan berhasil disimpan.');
    }
}

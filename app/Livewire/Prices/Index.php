<?php

namespace App\Livewire\Prices;

use Livewire\Component;
use App\Models\Price;
use App\Models\Outlet;
use App\Models\Item;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $prices = [];
    public $newPrices = [];
    public $outlets = [];
    public $items = [];
    public $outlet;
    public $outlet_id;
//    public $item_id;
    public $price = [];
    public $new_price = [];
    public $isEdit = false;
    public $isOpen = false;

    protected $rules = [
        'outlet_id' => 'required|exists:outlets,id',
        'item_id.*' => 'required|exists:items,id',
        'price.*' => 'numeric|min:0',
        'prices.*' => 'numeric|min:0',
        'new_price.*' => 'numeric|min:0',
    ];

    public function mount()
    {
        $this->outlets = Outlet::with(['prices.item'])->get();
//        $this->outlets = Outlet::where('status', 1)->get();
         $this->items = Item::where('status', 1)->get();

//        $this->items = Outlet::with(['prices' => function($query) {
//            $query->whereHas('item', function($query) {
//                $query->where('status', 1);
//            })->with('item');
//        }])->get();
//         dd($this->items);
        $this->newPrices = $this->prices;
    }

    public function render()
    {
//        $this->outlets = Outlet::with(['prices.item'])->get();
//        $this->outlets = Outlet::with(['prices' => function ($query) {
//            $query->whereHas('item', function ($query) {
//                $query->where('status', 1);
//            });
//        }])->get();
        // $prices = Price::with('outlet', 'item')->get();
        // ->orderBy('items.name', 'asc')
        // ->paginate(100);
//         dd($outlets);die;
        return view('livewire.prices.index',
            // compact('prices')
            [
                 'prices' => $this->prices,
                'outlets' => $this->outlets,
                // 'outlet' => $this->outlet
                ]
        );
    }

    public function create()
    {
        $this->outlets = Outlet::all();
        $this->items = Item::where('status', 1)->get();
        $this->resetInputFields();
        $this->openModal();
    }

    public function edit($id)
    {
//         dd($id);die;
        // $this->validate();
        // foreach ($this->items as $item) {
        //     Price::updateOrCreate(
        //         ['outlet_id' => $this->outlet_id, 'item_id' => $item->id],
        //         ['price' => $this->prices[$item->id] ?? 0]
        //     );
        // }

        $this->isEdit = true;
        $this->outlet = Outlet::findOrFail($id);
//        $this->outlet_id = $id;
//        $this->outlet_name = $this->outlet->name;

//        show price each item
        $this->prices = Price::with('outlet', 'item')
            ->whereHas('item', function($query) {
                $query->where('status', 1);
            })
            ->where('outlet_id', $id)
            ->get();
//         dd($this->prices);die;

        $this->openModal();
    }

    public function save()
    {
//        $this->closeModal();
//        $this->validate();
        $data = [];
        dd('outlet id', $this->outlet->id,
            'items', $this->items,
            'prices', $this->prices,
            'price_size', sizeof($this->prices),
            'new_price', $this->new_price,
            'price', $this->price);
        die;
        foreach ($this->items as $item) {
//            Price::updateOrCreate(
//                ['outlet_id' => $this->outlets->id, 'item_id' => $item->id],
//                ['price' => $this->newPrices[$item->id] ?? $this->prices[$item->id]->price]
//            );
            $data[] = [
                ['outlet_id' => $this->outlets->id, 'item_id' => $item->id],
                ['price' => $this->price [$item->id] ?? $this->prices[$item->id]->price]];
        }

//        session()->flash('message', $this->outlet_id ? 'Outlet updated successfully.' : 'Outlet created successfully.');
//
//        $this->closeModal();
//        $this->resetInputFields();
        dd($data);die;

//        $this->resetInput();
        // $this->dispatchBrowserEvent('close-modal');
    }

    public function updatePrice()
    {
        $this->validate();

        foreach ($this->items as $item) {
            Price::updateOrCreate(
//                ['outlet_id' => $this->outlet_id, 'item_id' => $item->id],
                ['price' => $this->prices[$item->id] ?? 0]
            );
        }

//        $this->resetInput();
//        $this->dispatchBrowserEvent('close-modal');
    }

    public function delete($id)
    {
        Price::findOrFail($id)->delete();
    }

    public function resetInputFields()
    {
        $this->mount();
        $this->isEdit = false;
        $this->isOpen = false;
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    // private function resetInputFields()
    // {
    //     $this->outlet_id = '';
        // $this->item_id = [];
        // $this->outlets = [];
        // $this->items = [];
        // $this->prices = [];
        // $this->isEdit = false;
        // $this->isOpen = false;
    // }
}

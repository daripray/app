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
    public $outlets = [];
    public $items = [];
    public $outlet;

    public $outlet_id;
    public $item_id = [];
    public $price = [];

    public $isEdit = false;
    public $isOpen = false;

    protected $rules = [
        'outlet_id' => 'required|exists:outlets,id',
        'item_id.*' => 'required|exists:items,id',
        'price.*' => 'required|numeric|min:0',
    ];

    public function mount()
    {
        $this->outlets = Outlet::orderBy('name', 'asc')->get();
		$this->items = Item::orderBy('name', 'asc')->get();
    }

    public function render()
    {
		$prices = Price::with('outlet', 'item')->orderBy('created_at', 'desc')->paginate(6);
        return view('livewire.prices.index',
            [
                 'prices' => $prices,
                'outlets' => $this->outlets,
                ]
        );
    }

    public function update($id)
    {
		$this->outlet_id = $id;
        $this->items = Item::with('prices')->get();
        $prices = Price::where('outlet_id', $id)->get();

        foreach ($prices as $price) {
            $this->prices[$price->item_id] = $price->price;
        }

        $this->outlet = Outlet::findOrFail($id);
        $this->isEdit = true;
        $this->openModal();
    }

    public function save()
    {
        $this->validate();
		foreach ($this->prices as $itemId => $price) {
			$existingPrice = Price::where('outlet_id', $this->outlet_id)
				->where('item_id', $itemId)
				->first();

			if ($existingPrice) {
				$existingPrice->price = $price;
				$existingPrice->save();
			} else {
				Price::create([
					'outlet_id' => $this->outlet_id,
					'item_id' => $itemId,
					'price' => $price,
				]);
			}
		}

        session()->flash('message_'.$this->outlet_id, $this->outlet_id ? 'Update harga berhasil.' : 'Tambah harga berhasil.');
        $this->closeModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->isEdit = false;
		$this->reset(['items', 'prices']);
    }
}

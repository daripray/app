<?php

namespace App\Livewire\Items;

use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $name, $description, $status, $itemId;
    public $isOpen = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'status' => 'boolean',
    ];

    public function render()
    {
        $items = Item::orderBy('name', 'asc')->paginate(100);
        return view('livewire.items.index', compact('items'));
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $this->itemId = $item->id;
        $this->name = $item->name;
        $this->description = $item->description;
        $this->status = $item->status ? true : false;
        $this->openModal();
    }

    public function save()
    {
        $this->validate();
        Item::updateOrCreate(
            [
                'id' => $this->itemId
            ],[
                'name' => $this->name,
                'description' => $this->description,
                'status' => $this->status,
            ]
        );

        session()->flash('message', $this->itemId ? 'Item updated successfully.' : 'Item created successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Item::find($id)->delete();
        session()->flash('message', 'Item deleted successfully.');
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->description = '';
        $this->status = 0;
        $this->itemId = null;
    }
}


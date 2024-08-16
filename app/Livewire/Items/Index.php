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

    public $itemsPerPage = 9;
    protected $listeners = ['load-more' => 'loadMore'];

    public function render()
    {
    	$items = Item::withCount('prices')->withTrashed()->orderBy('name', 'asc')->paginate($this->itemsPerPage);
//		dd($items);
        return view('livewire.items.index', compact('items'));
    }

    public function loadMore()
    {
        $this->itemsPerPage += $this->itemsPerPage;
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function update($id)
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

        session()->flash('message_'.$this->itemId, $this->itemId ? 'Item updated successfully.' : 'Item created successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function delete($id)
    {
        $item = Item::find($id);
		$item->delete();
        session()->flash('message_'.$id, 'Item deleted successfully.');
    }

    public function restore($id)
    {
        Item::onlyTrashed()->find($id)->restore();
        session()->flash('message_'.$id, 'Item restored successfully.');
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


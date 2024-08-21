<?php

namespace App\Livewire\Outlets;

use Livewire\Component;
use App\Models\Outlet;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $name, $description, $location, $status, $outletId;
    public $isOpen = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'location' => 'required|string|max:255',
        'status' => 'boolean',
    ];

    public $itemsPerPage = 9;
    protected $listeners = ['load-more' => 'loadMore'];

    public function render()
    {
    	$outlets = Outlet::withCount('prices')->withTrashed()->orderBy('name', 'asc')->orderBy('deleted_at', 'asc')->paginate($this->itemsPerPage);
        return view('livewire.outlets.index',
        [
            'outlets' => $outlets,
        ]);
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
        $outlet = Outlet::findOrFail($id);
        $this->outletId = $outlet->id;
        $this->name = $outlet->name;
        $this->description = $outlet->description;
        $this->location = $outlet->location;
        $this->status = $outlet->status ? true : false;
        $this->openModal();
    }

    public function save()
    {
        $this->validate();

        Outlet::updateOrCreate(
            [
                'id' => $this->outletId
            ],[
                'name' => $this->name,
                'description' => $this->description,
                'location' => $this->location,
                'status' => $this->status,
            ]
        );

        session()->flash('message_'.$this->outletId, $this->outletId ? 'Outlet updated successfully.' : 'Outlet created successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Outlet::find($id)->delete();
        session()->flash('message_'.$id, 'Outlet deleted successfully.');
    }

    public function restore($id)
    {
        Outlet::onlyTrashed()->find($id)->restore();
        session()->flash('message_'.$id, 'Outlet restored successfully.');
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
        $this->location = '';
        $this->status = true;
        $this->outletId = null;
    }
}

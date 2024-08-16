<?php

namespace App\Livewire\Features;

use Livewire\Component;

class Show extends Component
{
	public $itemId = '';
	public $isOpen = false;

	public function mount(){
		$this->itemId;
		$id = 10;
	}

    public function render()
    {
		$id = 55;
        return view('livewire.features.show',
			[
				'itemId' => $this->itemId,
				'id'=>$id
			]);
    }

	public function create(){
		$this->openModal();
	}

	public function update($id){
		$this->itemId = $id;
		$this->openModal();
	}

	public function save(){
		if(!$this->itemId)
			// do add() or create()
	        session()->flash('message', 'Item created successfully.');
		else
			// do update()
	        session()->flash('message_'.$this->itemId, ' Item updated successfully.');
		$this->closeModal();
	}

	public function delete($id){
		// do delete()
        session()->flash('message_'.$id, 'Item deleted successfully.');
	}

	public function restore($id){
		// do restore()
        session()->flash('message_'.$id, 'Item restored successfully.');
	}

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
		$this->resetForm();
    }

    public function resetForm()
    {
		$this->itemId = '';
        $this->isOpen = false;
    }
}

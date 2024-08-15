<div>
    <div class="row justify-content-between">
        <div class="col-6">
            <h1>Makanan</h1>
        </div>
        <div class="col-6 text-end">
            <button wire:click="create()" class="btn btn-primary" title="Create">
                <i class="bi bi-plus-square"></i>
            </button>
        </div>
    </div>
    @if($isOpen)
        @include('livewire.items.modal')
    @endif
    <div class="mt-4 row">
        @foreach($items as $item)
            <div class="mb-4 col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">{{ $item->name }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $item->description }}</p>
                        <p class="card-text">Status: <strong class="{{ $item->status ? 'text-success' : 'text-secondary'}}">{{ $item->status ? 'Aktif' : 'Non-Aktif' }}</strong></p>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-between">
                            <div class="text-center col-6"><button wire:click="edit({{ $item->id }})" class="btn btn-warning"><i class="bi bi-pencil-square"></i></button></div>
                            <div class="text-center col-6"><button wire:click="delete({{ $item->id }})" class="btn btn-danger"><i class="bi bi-trash3"></i></button></div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-4 row">
        {{ $items->links() }}
    </div>
</div>

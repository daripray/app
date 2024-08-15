<div>
    <div class="row justify-content-between">
        <div class="col-6">
            <h1>Outlet</h1>
        </div>
        <div class="col-6 text-end">
            <button wire:click="create()" class="btn btn-primary" title="Create">
                <i class="bi bi-plus-square"></i>
            </button>
        </div>
    </div>
    @if($isOpen)
        @include('livewire.outlets.modal')
    @endif
    <div class="mt-4 row">
        @foreach($outlets as $outlet)
            <div class="mb-4 col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">{{ $outlet->name }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $outlet->description }}</p>
                        <p><strong>Lokasi:</strong> {{ $outlet->location }}</p>
                        <p class="card-text">Status: <strong class="{{ $outlet->status ? 'text-success' : 'text-secondary'}}">{{ $outlet->status ? 'Aktif' : 'Non-Aktif' }}</strong></p>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-between">
                            <div class="text-center col-6"><button wire:click="edit({{ $outlet->id }})" class="btn btn-warning"><i class="bi bi-pencil-square"></i></button></div>
                            <div class="text-center col-6"><button wire:click="delete({{ $outlet->id }})" class="btn btn-danger"><i class="bi bi-trash3"></i></button></div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <!-- Infinite Scroll -->
    {{-- <div wire:loading wire:target="loadMore">
        <div class="text-center">Loading...</div>
    </div> --}}

    {{-- <div class="row">
        {{ $outlets->links() }}
    </div> --}}
</div>

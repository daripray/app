<div>
    <!-- Button untuk memicu modal -->

    <div class="row justify-content-between">
        <div class="col-6">
            <h3>Harga</h3>
        </div>
    </div>

    @if($isOpen)
        @include('livewire.prices.modal')
    @endif

    <!-- Tampilkan data menggunakan card dengan infinite scroll -->
    <div class="mt-4 row">
        @foreach($outlets as $outlet)
            <div class="mb-3 col-md-4">
                <div class="card">
                    <div class="card-body">
                        @if($outlet->status)
                            <div class="card-title text-center ms-0" wire:click="edit({{ $outlet->id }})">{{ $outlet->name }}  <i class="bi bi-pencil text-info"></i></div>
                        @else
                            <div class="card-title text-center ms-0">{{ $outlet->name }}</div>
                        @endif

                        @foreach ($outlet->prices as $price)
                            @if($price->item->status)
                            <div class="row">
                                <strong for="staticEmail" class="col-6">{{ $price->item->name }}</strong>
                                <span class="col text-end" id="staticEmail">{{ number_format($price->price, 2) }}</span>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Infinite Scroll -->
    {{-- <div wire:loading wire:target="loadMore">
        <div class="text-center">Loading...</div>
    </div> --}}
</div>

<div class="container mt-4">
    <h1>Penjualan</h1>
    
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="mb-3">
        <button class="btn btn-primary" wire:click="openModal">Tambah Penjualan</button>
    </div>

    <!-- Filter -->
    <div class="mb-3">
        <form>
            <div class="row">
                <div class="col-md-3">
                    <label for="filterDate" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="filterDate" wire:model="filterDate">
                </div>
                <div class="col-md-3">
                    <label for="filterOutlet" class="form-label">Outlet</label>
                    <select class="form-select" id="filterOutlet" wire:model="filterOutlet">
                        <option value="">Pilih Outlet</option>
                        @foreach($outlets as $outlet)
                            <option value="{{ $outlet->id }}">{{ $outlet->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
    </div>

    <!-- List Penjualan -->
    @foreach($sales as $sale)
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="card-title">Penjualan #{{ $sale->id }} - {{ $sale->outlet->name }} - {{ $sale->date->format('d-m-Y') }}</h5>
                <button class="btn btn-primary btn-sm" wire:click="openModal({{ $sale->id }})">Edit</button>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach($sale->details as $detail)
                        <li class="list-group-item">
                            {{ $detail->item->name }} - {{ number_format($detail->price, 0, ',', '.') }} x {{ $detail->sold }} = {{ number_format($detail->total, 0, ',', '.') }}
                        </li>
                    @endforeach
                </ul>
                <div class="mt-3">
                    <strong>Total: </strong> {{ number_format($sale->total, 0, ',', '.') }}
                </div>
            </div>
        </div>
    @endforeach

    <!-- Pagination -->
{{--    {{ $sales->links() }}--}}

    <!-- Modal -->
    @if($isOpen)
        @include('livewire.sales.modal')
    @endif
</div>

<div class="mt-2">
    <div class="mb-3 row justify-content-between">
        <div class="col-auto">
            <h1>Harga</h1>
        </div>
    </div>

    @if($isOpen)
        @include('livewire.prices.modal')
    @endif

	@if (session()->has('message_'))
		<div class="alert alert-success">
			{{ session('message') }}
		</div>
	@endif

    <!-- Tampilkan data menggunakan card dengan infinite scroll -->
    @foreach($outlets as $outlet)
        @if($outlet->status)
        <div class="card mb-4 shadow">
			<div class="card-header text-center">
                <h5 class="card-title text-{{sizeof($outlet->prices)?'success':'warning'}}" data-bs-toggle="collapse" href="#collapse_{{ $outlet->id }}" role="button" aria-expanded="false" aria-controls="collapse_{{ $outlet->id }}">{{ $outlet->name }}</h5>
                <cite class="text-secondary opacity-50">{{sizeof($outlet->prices)?'':'Harga belum diseting.'}}</cite>
            </div>
		@else
		<div class="mb-4 card shadow text-secondary opacity-50">
            <div class="card-header text-center">
                <h5 class="card-title" data-bs-toggle="collapse" href="#collapse_{{ $outlet->id }}" role="button" aria-expanded="false" aria-controls="collapse_{{ $outlet->id }}">{{ $outlet->name }}</h5>
                <cite>Status outlet tidak aktif.</cite>
            </div>
		@endif
            <div class="card-body {{ $outlet->status && sizeof($outlet->prices) ? 'collapse show' : 'collapse' }}" id="collapse_{{ $outlet->id }}">
                @if (session()->has('message_'.$outlet->id))
                <div class="alert alert-success">
                    {{ session('message_'.$outlet->id) }}
                </div>
				@endif
                @foreach ($outlet->prices as $price)
                    <div class="row {{ $price->item->status?'':'text-secondary' }}">
                        <p class="col-auto me-auto"><strong>{{ $price->item->name }}</strong></p>
                        <span class="col-auto {{ $price->item->status?'':'text-secondary' }}">{{ number_format($price->price, 0,",",".") }}</span>
                    </div>
                @endforeach
            </div>
            
            <div class="card-footer text-center">
				<div class="row justify-content-between">
					<div class="col">
						<button class="btn btn-{{!$outlet->status?'hide':'update'}}" wire:click="update({{ $outlet->id }})"><i class="bi bi-pencil"></i> Edit</button>
					</div>
				</div>
            </div>
        </div>
    @endforeach
</div>


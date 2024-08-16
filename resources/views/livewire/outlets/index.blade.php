<div class="mt-2">
    <div class="mb-3 row justify-content-between">
        <div class="col-auto me-auto">
            <h1>Outlet</h1>
        </div>
        <div class="col-auto pt-2">
            <button class="btn btn-create" title="Create" wire:click="create()" ><i class="bi bi-plus"></i></button>
        </div>
    </div>

    @if($isOpen)
        @include('livewire.outlets.modal')
    @endif

	@if (session()->has('message_'))
		<div class="alert alert-success">
			{{ session('message_') }}
		</div>
	@endif

    @foreach($outlets as $outlet)
        @if(empty($outlet->deleted_at))
        <div class="card mb-4 shadow">
			<div class="card-header text-center">
                <h5 class="card-title text-info">{{ $outlet->name }}</h5>
            </div>
		@else
		<div class="mb-4 card shadow text-secondary opacity-50">
            <div class="card-header text-center">
                <h5 class="card-title" data-bs-toggle="collapse" href="#collapse_{{ $outlet->id }}" role="button" aria-expanded="false" aria-controls="collapse_{{ $outlet->id }}">{{ $outlet->name }}</h5>
            </div>
		@endif
            <div class="card-body {{ empty($outlet->deleted_at) ? '' : 'collapse' }}" id="collapse_{{ $outlet->id }}">
                @if (session()->has('message_'.$outlet->id))
                <div class="alert alert-success">
                    {{ session('message_'.$outlet->id) }}
                </div>
				@endif
                <p><strong>Deskripsi:</strong> {{ $outlet->description }}</p>
                <p><strong>Lokasi:</strong> {{ $outlet->location }}</p>
                <p><strong>Status: {{ $outlet->status ? 'Aktif' : 'Non-Aktif' }}</strong></p>
            </div>
            <div class="card-footer text-center">
				<div class="row justify-content-between">
					<div class="col">
						<button class="btn btn-{{$outlet->deleted_at?'hide':'update'}}" wire:click="update({{ $outlet->id }})"><i class="bi bi-pencil"></i> Edit</button>
					</div>
					<div class="col">
						<button class="btn btn-{{!$outlet->deleted_at && $outlet->prices_count==0?'delete':'hide'}}" wire:click="delete({{ $outlet->id }})"><i class="bi bi-trash3"></i> Delete</button>
						<button class="btn btn-{{$outlet->deleted_at?'restore':'hide'}}" wire:click="restore({{ $outlet->id }})"><i class="bi bi-arrow-counterclockwise"></i> Restore</button>
					</div>
				</div>
            </div>
         </div>
    @endforeach

	<!-- Infinite Scroll Loading Indicator -->
	@if($outlets->hasMorePages())
	<div wire:loading wire:target="loadMore" class="text-center my-4">
		<div class="spinner-border text-primary" role="status">
			<span class="visually-hidden">Loading...</span>
		</div>
	</div>
    @endif
	<script>
		document.addEventListener('scroll', function() {
			if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
				@this.call('loadMore');
			}
		});
	</script>
</div>


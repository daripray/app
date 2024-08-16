<div>
    <div class="row">
		<div class="col-auto me-auto">
            <h1>Outlet</h1>
        </div>
		<div class="col-auto">
            <button wire:click="create()" class="btn btn-create" title="Create">
                <i class="bi bi-plus-lg"></i>
            </button>
        </div>
    </div>

    @if($isOpen)
        @include('livewire.features.modal')
    @endif

					@if (session()->has('message'))
						<div class="alert alert-success">
							{{ session('message') }}
						</div>
					@endif

	{{$id}}
{{--	{{$itemId}}--}}
    <div class="mb-3 card gradient-card">
        <div class="card-header text-center bg-white"><span class="card-title">Card</span></div>
        <div class="card-body">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Explicabo, illo? Repellendus debitis nostrum neque. Ea sed soluta expedita, enim repellendus possimus est delectus laboriosam aliquam quis dolorum rerum sunt assumenda?</div>
    </div>
			<div class="mb-4 card shadow">
				<div class="card-header text-center">
					<h5 class="card-title text-info">Item Name</h5>
				</div>
				<div class="card-body">
					<p><strong>Deskripsi:</strong> Deskripsi</p>
					<p><strong>Status: Status</strong></p>
				</div>
				<div class="card-footer">
					<div class="row">
						<div class="col-auto me-auto">
							<button class="btn btn-update" wire:click="update({{ $id }})"><i class="bi bi-pencil"></i> Edit</button>
						</div>
						<div class="col-auto">
							<button class="btn btn-delete" wire:click="delete({{ $id }})"><i class="bi bi-trash3"></i> Delete</button>
	{{--					<h3 class="me-1 font-weight-bold bi bi-trash3 text-danger"></h3>--}}
						</div>
					</div>
				</div>
			</div>
			<div class="mb-4 card shadow">
				<div class="card-header text-center">
					<h5 class="card-title text-info">Model 1</h5>

					<hr>

					<div class="row">
						<div class="col-auto me-auto">
							<h3 class="card-title">Model 2</h3>
						</div>
						<div class="col-auto">
							<button class="btn btn-update" wire:click="update({{ $id }})"><i class="bi bi-pencil"></i> Edit</button>
							<button class="btn btn-update" wire:click="update({{ $id }})"><i class="bi bi-pencil"></i> Edit</button>
						</div>
					</div>
				</div>
				<div class="card-body">

					@if (session()->has('message_'.$id))
						<div class="alert alert-success">
							{{ session('message_'.$id) }}
						</div>
					@endif

					<p><strong>Deskripsi:</strong> Deskripsi</p>
					<p><strong>Status: Status</strong></p>
				</div>
				<div class="card-footer text-center">
					<b>Model 1</b>
					<div class="row">
						<div class="col-auto me-auto">
							<button class="btn btn-update" wire:click="update({{ $id }})"><i class="bi bi-pencil"></i> Edit</button>
						</div>
						<div class="col-auto">
							<button class="btn btn-delete" wire:click="delete({{ $id }})"><i class="bi bi-trash3"></i> Delete</button>
						</div>
					</div>

					<hr>
					<b>Model 2</b>
					<div class="row justify-content-between">
						<div class="col-4">
							<button class="btn btn-update" wire:click="update({{ $id }})"><i class="bi bi-pencil"></i></button>
						</div>
						<div class="col">
							<button class="btn btn-restore" wire:click="restore({{ $id }})"><i class="bi bi-arrow-counterclockwise"></i></button>
						</div>
						<div class="col">
							<button class="btn btn-delete" wire:click="delete({{ $id }})"><i class="bi bi-trash3"></i></button>
						</div>
					</div>

					<hr>
					<b>Model 3</b>
					<div class="row col-12">
						<div class="col-auto me-auto">
							<button class="btn btn-update" wire:click="update({{ $id }})"><i class="bi bi-pencil"></i> Edit</button>
						</div>
						<div class="col-auto me-auto">
							<button class="btn btn-restore" wire:click="restore({{ $id }})"><i class="bi bi-arrow-counterclockwise"></i> Restore</button>
						</div>
						<div class="col-auto">
							<button class="btn btn-restore" wire:click="restore({{ $id }})"><i class="bi bi-arrow-counterclockwise"></i> Restore</button>
						</div>
					</div>
				</div>
			</div>
			<div class="mb-4 card shadow text-secondary">
				<div class="card-header text-center">
					<h5 class="card-title">Item Deleted</h5>
				</div>
				<div class="card-body">
					<p><strong>Deskripsi:</strong> Deskripsi</p>
					<p><strong>Status: Status</strong></p>
				</div>
				<div class="card-footer">
					<div class="row">
						<div class="col-auto me-auto">
							<button class="btn btn-hide" wire:click="update({{ $id }})"><i class="bi bi-pencil"></i> Edit</button>
						</div>
						<div class="col-auto">
							<button class="btn btn-restore" wire:click="restore({{ $id }})"><i class="bi bi-arrow-counterclockwise"></i> Restore</button>
						</div>
					</div>
				</div>
			</div>
			<div class="mb-3 card shadow ">
				<div class="card-body text-secondary">
					<h5 class="col-auto me-auto text-center text-secondary opacity-50 ">Item Deleted</h5>
					<hr>
					<p><strong>Deskripsi:</strong> Deskripsi</p>
					<p><strong>Status: Status</strong></p>
					<div class="row">
						<div class="col-auto me-auto"></div>
						<div class="col-auto">
							<h3 class="me-1 font-weight-bold bi bi-arrow-counterclockwise text-success"></h3>
						</div>
					</div>
				</div>
			</div>

</div>

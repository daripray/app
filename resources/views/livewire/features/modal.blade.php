<div class="modal fade show d-block" style="background-color: rgba(0,0,0,0.5);" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $itemId ? 'Edit' : 'Tambah' }} Data ... </h5>
                <button type="button" class="btn-close" wire:click="closeModal()" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" wire:model="name">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" wire:model="description"></textarea>
                        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-check form-switch">

                        <input class="form-check-input" type="checkbox" role="switch" id="status" wire:model="status">
                        <label class="form-check-label" for="status">Aktif</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
				<div class="row col-12">
					<div class="col-auto me-auto">
                		<button type="button" class="btn btn-cancel" wire:click="closeModal()"><i class="bi bi-x-lg"></i> Close</button>
					</div>
					<div class="col-auto">
                		<button type="button" class="btn btn-save" wire:click="save()"><i class="bi bi-floppy"></i > Save {{ $itemId ? 'changes' : '' }}</button>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>

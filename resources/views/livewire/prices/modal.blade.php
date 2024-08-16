<div class="modal fade show d-block modal-sm" style="background-color: rgba(0,0,0,0.5);" tabindex="-1" id=" ">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="priceModalLabel">{{ $isEdit ? 'Edit' : 'Tambah' }} Harga Outlet {{ $outlet->name }}</h5>
                <button type="button" class="btn-close" wire:click="closeModal()" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					@foreach($items as $item)
						<div class="mb-3">
							<label for="item{{ $item->id }}" class="form-label">{{ $item->name }}</label>
							<input type="number" step="100" class="form-control text-end" id="item{{ $item->id }}"
								   wire:model.defer="prices.{{ $item->id }}"
								   @if ($item->status == 0) readonly disabled @endif>
							@error('prices.' . $item->id)
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					@endforeach
                </form>
            </div>
            <div class="modal-footer">
				<div class="row col-12">
					<div class="col-auto me-auto">
                		<button type="button" class="btn btn-cancel" wire:click="closeModal()"><i class="bi bi-x-lg"></i> Close</button>
					</div>
					<div class="col-auto">
                		<button type="button" class="btn btn-save" wire:click="save()"><i class="bi bi-floppy"></i > Save {{ $isEdit ? 'changes' : '' }}</button>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>

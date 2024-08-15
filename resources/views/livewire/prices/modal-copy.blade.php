
{{-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#priceModal"><i class="bi bi-plus-square"></i></button> --}}

{{-- <div class="modal fade show d-block" style="background-color: rgba(0,0,0,0.5);" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Outlet</h5>
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
                    <div class="mb-3">
                        <label for="location" class="form-label">Lokasi</label>
                        <input type="text" class="form-control" id="location" wire:model="location">
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="status" wire:model="status">
                        <label class="form-check-label" for="status">Aktif</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="closeModal()">Batal</button>
                <button type="button" class="btn btn-primary" wire:click="save()">Simpan</button>
            </div>
        </div>
    </div>
</div> --}}

<div class="modal fade" id="priceModal" tabindex="-1" aria-labelledby="priceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title" id="priceModalLabel">{{ $isEdit ? 'Edit' : 'Tambah' }} Harga</h5> --}}
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}

                {{-- <button type="button" class="btn-close" wire:click="closeModal()" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem, excepturi? Corrupti omnis aspernatur quisquam suscipit aut quos. Consequuntur, possimus? Facilis a optio aliquam fuga porro mollitia dicta ipsa consequatur exercitationem.</p>
                {{-- <form wire:submit.prevent="{{ $isEdit ? 'updatePrice' : 'storePrice' }}">
                    <div class="mb-3">
                        <label for="outlet_id" class="form-label">Outlet</label>
                        <select id="outlet_id" class="form-select" wire:model="outlet_id">
                            <option value="">Pilih Outlet</option>
                            @foreach($outlets as $outlet)
                                <option value="{{ $outlet->id }}">{{ $outlet->name }}</option>
                            @endforeach
                        </select>
                    </div> --}}

                    {{-- @foreach($items as $item)
                        <div class="mb-3">
                            <label for="price_{{ $item->id }}" class="form-label">{{ $item->name }}</label>
                            <input type="number" step="0.01" class="form-control" id="price_{{ $item->id }}" wire:model="prices.{{ $item->id }}" for="price">
                        </div>
                    @endforeach --}}

                    {{-- <button type="submit" class="mt-3 btn btn-primary">{{ $isEdit ? 'Update' : 'Simpan' }}</button> --}}
                {{-- </form> --}}
            </div>
        </div>
    </div>
</div>

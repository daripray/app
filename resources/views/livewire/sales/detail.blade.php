<div class="modal show d-block">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $isEdit ? 'Ubah' : 'Tambah' }} Penjualan</h5>
                <button type="button" class="btn-close" wire:click="closeModal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="date" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" wire:model="date">
                </div>

                <div class="mb-3">
                    <label for="outlet_id" class="form-label">Outlet</label>
                    <select class="form-control" wire:model="outlet_id">
                        <option value="">Pilih Outlet</option>
                        @foreach($outlets as $outlet)
                            <option value="{{ $outlet->id }}">{{ $outlet->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    @foreach($items as $item)
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">{{ $item->name }}</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" wire:model="quantity.{{ $item->id }}" placeholder="Qty">
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" wire:model="sold.{{ $item->id }}" placeholder="Sold">
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" wire:model="totals.{{ $item->id }}" placeholder="Total">
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mb-3">
                    <label for="total" class="form-label">Total</label>
                    <input type="text" class="form-control" wire:model="total" readonly>
                </div>

                <div class="mb-3">
                    <label for="paid" class="form-label">Paid</label>
                    <input type="text" class="form-control" wire:model="paid">
                </div>

                <div class="mb-3">
                    <label for="paidoff" class="form-label">Lunas</label>
                    <input type="checkbox" class="form-check-input" wire:model="paidoff">
                </div>

                <div class="mb-3">
                    <label for="notes" class="form-label">Notes</label>
                    <textarea class="form-control" wire:model="notes"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="closeModal">Close</button>
                <button type="button" class="btn btn-primary" wire:click="save()">Save changes</button>
            </div>
        </div>
    </div>
</div>

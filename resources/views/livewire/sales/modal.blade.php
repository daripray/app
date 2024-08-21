<div class="modal fade show" tabindex="-1" style="display: block;" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $saleId ? 'Ubah Penjualan' : 'Tambah Penjualan' }}</h5>
                <button type="button" class="btn-close" wire:click="closeModal"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="save">
                    <div class="mb-3">
                        <label for="date" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="date" wire:model="date">
                        @error('date') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="outletId" class="form-label">Outlet</label>
                        <select class="form-select" id="outletId" wire:model="outletId" wire:click="checkIsExist">
                            <option value="">Pilih Outlet</option>
                            @foreach($outlets as $outlet)
                                <option value="{{ $outlet->id }}">{{ $outlet->name }}</option>
                            @endforeach
                        </select>
                        @error('outletId') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

{{--                    @if($this->isExist($date, $outletId))--}}
{{--                        <div class="alert alert-warning">--}}
{{--                            Data penjualan untuk tanggal ini dan outlet ini sudah ada. Silakan perbarui data yang ada.--}}
{{--                        </div>--}}
{{--                    @else--}}
                    {{dd($items)}}
                        <div class="mb-3">
                            @foreach($items as $index => $item)
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item['name'] }}</h5>
                                        <input type="hidden" wire:model="items.{{ $index }}.id" value="{{ $item['id'] }}">
                                        <div class="mb-2">
                                            <label for="quantity-{{ $index }}" class="form-label">Quantity</label>
                                            <input type="number" class="form-control" id="quantity-{{ $index }}" wire:model="items.{{ $index }}.quantity" min="0">
                                        </div>
                                        <div class="mb-2">
                                            <label for="sold-{{ $index }}" class="form-label">Sold</label>
                                            <input type="number" class="form-control" id="sold-{{ $index }}" wire:model="items.{{ $index }}.sold" min="0" wire:input="calculateSubtotal({{ $index }})">
                                        </div>
                                        <div class="mb-2">
                                            <label for="price-{{ $index }}" class="form-label">Price</label>
                                            <input type="number" class="form-control" id="price-{{ $index }}" wire:model="items.{{ $index }}.price" readonly>
                                        </div>
                                        <div class="mb-2">
                                            <label for="subtotal-{{ $index }}" class="form-label">Subtotal</label>
                                            <input type="number" class="form-control" id="subtotal-{{ $index }}" wire:model="items.{{ $index }}.subtotal" readonly>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
{{--                    @endif--}}

                    <div class="mb-3">
                        <strong>Total Quantity:</strong> {{ $totalQuantity }}
                    </div>
                    <div class="mb-3">
                        <strong>Total Sold:</strong> {{ $totalSold }}
                    </div>
                    <div class="mb-3">
                        <strong>Total:</strong> {{ number_format($total, 0, ',', '.') }}
                    </div>

                    <div class="mb-3">
                        <label for="paid" class="form-label">Paid</label>
                        <input type="number" class="form-control" id="paid" wire:model="paid" min="0">
                    </div>
                    @if($paid > $total)
                        <div class="alert alert-warning">
                            Pembayaran lebih dari total penjualan.
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Paidoff</label>
                        <div>
                            <label><input type="radio" wire:model="paidoff" value="1"> Belum</label>
                            <label><input type="radio" wire:model="paidoff" value="0"> Sudah</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="notes" class="form-label">Notes</label>
                        <textarea class="form-control" id="notes" wire:model="notes"></textarea>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" wire:click="closeModal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

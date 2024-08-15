<div class="modal fade show d-block" style="background-color: rgba(0,0,0,0.5);" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="priceModalLabel">{{ $isEdit ? 'Edit' : 'Tambah' }} Harga Outlet: {{ $outlet->name }}</h5>
                <button type="button" class="btn-close" wire:click="closeModal()" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    @if (sizeof($outlet->prices)>0)
                        {{--price has set--}}
                        @foreach($outlet->prices as $price)
                            @if($price->item->status)
                            <div class="input-group mb-3">
                                <b class="input-group-text" for="price_{{ $price->item->id }}"><strong>{{ $price->item->name }}</strong></b>
                                <input type="number" class="form-control text-end" step="0.01" id="price_{{ $price->item->id }}" wire:model="new_price.{{ $price->item->id }}"  for="price_{{ $price->item->id }}">
                            </div>
                            @endif
                        @endforeach
                    @else
                        {{--price not set--}}
{{--                    {{$items}}--}}
                        @foreach($items as $item)
                            <div class="mb-3">
                                <div class="input-group mb-3">
                                    <b class="input-group-text" for="price_{{ $item->id }}"><strong>{{ $item->name }}</strong></b>
                                    <input type="number" class="form-control text-end" step="0.01" id="price_{{ $item->id }}" wire:model="new_price.{{ $item->id }}" for="price_{{ $item->id }}">
                                </div>
                            </div>
                        @endforeach
                    @endif
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" wire:click="save()">Simpan</button>
            </div>
        </div>
    </div>
</div>

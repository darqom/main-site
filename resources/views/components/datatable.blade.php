<div class="table-responsive">
    <div class="d-flex justify-content-{{ $dynamic ? 'between' : 'end' }} pb-3">
    @if ($dynamic)
        <select wire:model="paginate" class="form-control" style="width: auto;">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
    @endif
        <div class="input-group" style="width: 15rem;">
            <input type="text" class="form-control" placeholder="Cari.." wire:model.debounce.500ms="keyword">
        </div>
    </div>
    {{ $slot }}

    {{ $data->links('components.paginate') }}
</div>

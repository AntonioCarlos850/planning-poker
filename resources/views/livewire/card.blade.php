<div class="col-4 col-md-1 py-2 px-2
    fs-2 fw-bold" wire:click="select" wire:poll>
    <div @class([
        'rounded planning-card justify-content-center d-flex align-items-center',
        'selected' => $isSelected,
    ])>
        {{ $card->value }}
    </div>
</div>

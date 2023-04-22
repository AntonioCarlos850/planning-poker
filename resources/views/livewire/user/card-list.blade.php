<div @class([
    'flip-card text-light col-2 fs-2 me-3 fw-bold rounded planning-card',
    'show' => $show,
])>
    <div class="flip-card-inner">
        <div class="flip-card-front bg-secondary"></div>
        <div class="flip-card-back bg-dark justify-content-center d-flex align-items-center">
            {{ $card->value }}
        </div>
    </div>
</div>

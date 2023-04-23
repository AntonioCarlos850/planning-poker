<div @class([
    'flip-card text-light col-8 col-md-2 fs-2 me-3 fw-bold',
    'show' => $show,
])>
    <div class="flip-card-inner">
        <div @class(['flip-card-front rounded', 'selected' => $isSelectedCard])></div>
        <div class="flip-card-back justify-content-center d-flex align-items-center rounded">
            {{ $card->value }}
        </div>
    </div>
</div>

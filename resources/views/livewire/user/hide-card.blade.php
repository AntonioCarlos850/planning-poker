<div class="col-12 d-flex justify-content-between mt-4" id="switch">
    <div class="fs-3 fw-semibold py-2 pr-4">
        Average: {{ rtrim(rtrim(sprintf('%.2f', $session->average), '0'), '.') }}
    </div>
    <div class="fs-3 fw-semibold py-2 px-4 cursor btn btn-warning" wire:click="hide" wire:poll>
        Hide and clear all cards
    </div>
</div>

<style>
    @media (max-width: 768px) {
        #switch {
            flex-direction: column;
            text-align: right;
        }
    }
</style>

<div class="card">
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('error') }}
        </div>
    @endif

    <div class="card-header">
        <h4 class="text-center"> {{ __('Charge Account with DIST Coins') }} </h4>
    </div>
    <div class="card-body">
        <h6 class="text-center"> {{ __('1 DOLLAR = 16 DIST') }} </h6>
        <form id="chargeForm">
            <div class="form-group mt-2">
                <label for="moneyAmount"> {{ __('Money - $') }} </label>
                <input type="number" class="form-control @error('money') is-invalid @enderror" id="moneyAmount"
                    placeholder="Enter the money amount" wire:model="money">
                @error('money')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="coinsAmount"> {{ __('Coins - DIST') }} </label>
                <input type="text" class="form-control @error('coins') is-invalid @enderror" id="coinsAmount"
                    readonly wire:model="coins">
                @error('coins')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="button" wire:click="submitPayment" class="btn btn-primary btn-block mt-4">
                {{ __('Pay Now!') }} </button>
        </form>
    </div>
</div>

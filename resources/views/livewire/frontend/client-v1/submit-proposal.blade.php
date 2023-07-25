<div class="card-body bg-white">
    <h5 class="card-title"> {{ __('Submit your proposal') }} </h5>


    <hr>

    @if (is_null(disableCredits()) && $job->dist_count > disableCredits())
        <div class="alert alert-warning" role="alert">
            {{ __('You do not have enought credits to submit a proposal for this job, you can go to ') }} <a
                href="{{ route('clientv1.credits') }}">{{ __('charge some credits') }}</a>
        </div>
    @endif

    @if ($allowedToPropose)
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if ($isSubmitted)
                <div class="alert alert-success" role="alert">
                    {{ __('Your proposal submitted successfully') }}
                </div>
            @endif
            <div class="row">
                <!--Start Delivery period -->
                <div class="d-flex justify-content-between  gap-lg-3 flex-wrap mt-3">
                    <div class="col-md-4 mb-1 ">
                        <div class="form-group">
                            <label for="inputField"> {{ __('Delivery period') }} </label>
                            <div class="input-group input-group-sm mt-1">
                                <input type="text" class="form-control" aria-label="Small" wire:model="period" @if (is_null(disableCredits()) && $job->dist_count > disableCredits()) readonly="" @endif
                                    aria-describedby="inputGroup-sizing-sm">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text rounded-0 rounded-end-1 disabled text-black-50"
                                        id="inputGroup-sizing-sm"> {{ __('Days') }} </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Delivery period -->

                    <div class="col-md-4 mb-1">
                        <div class="form-group">
                            <label for="inputField"> {{ __('Salary') }} </label>
                            <div class="input-group input-group-sm mt-1">
                                <input type="text" class="form-control" id="inputField1" aria-label="Small"
                                    @if (is_null(disableCredits()) && $job->dist_count > disableCredits()) readonly="" @endif
                                    aria-describedby="inputGroup-sizing-sm" wire:model="salary">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0 rounded-end-1 disabled text-black-50"
                                        id="inputGroup-sizing-sm">$</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-1 balance">
                        <div class="form-group">
                            <label for="inputField"> {{ __('VAT') }} </label>
                            <div class="input-group input-group-sm mt-1">
                                <input type="text" class="form-control bg-secondary-light" id="inputField2"
                                    wire:model="vat" aria-label="Small" aria-describedby="inputGroup-sizing-sm"
                                    readonly="">
                                <div class="input-group-prepend">
                                    <span
                                        class="input-group-text rounded-0 rounded-end-1 text-black-50 bg-secondary-light"
                                        id="inputGroup-sizing-sm">$</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="form-group mt-2">
                    <label for="inputField"> {{ __('Offer details') }} </label>
                    <div class="input-group">
                        <textarea class="form-control border rounded-1 border-secondary-subtle" name="" id="" cols="100" @if (is_null(disableCredits()) && $job->dist_count > disableCredits()) readonly="" @endif
                            wire:model="proposal" rows="10"></textarea>
                    </div>
                </div>



            </div>
            <button class="btn btn-primary mt-4" type="button" wire:click="submitProposal"> {{ __('Submit') }}
            </button>
        </div>
    @else
        <div class="container">


            <div class="alert alert-warning" role="alert">
                {{ __('You were proposed for this job before !!') }}
            </div>

            <div class="row">
                <!--Start Delivery period -->
                <div class="d-flex justify-content-between  gap-lg-3 flex-wrap mt-3">
                    <div class="col-md-4 mb-1 ">
                        <div class="form-group">
                            <label for="inputField"> {{ __('Delivery period') }} </label>
                            <div class="input-group input-group-sm mt-1">
                                <input type="text" class="form-control" aria-label="Small" wire:model="period"
                                    aria-describedby="inputGroup-sizing-sm" readonly>
                                <div class="input-group-prepend ">
                                    <span class="input-group-text rounded-0 rounded-end-1 disabled text-black-50"
                                        id="inputGroup-sizing-sm"> {{ __('Days') }} </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Delivery period -->

                    <div class="col-md-4 mb-1">
                        <div class="form-group">
                            <label for="inputField"> {{ __('Salary') }} </label>
                            <div class="input-group input-group-sm mt-1">
                                <input type="text" class="form-control" id="inputField1" aria-label="Small"
                                    aria-describedby="inputGroup-sizing-sm" wire:model="salary" readonly>
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0 rounded-end-1 disabled text-black-50"
                                        id="inputGroup-sizing-sm">$</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-1 balance">
                        <div class="form-group">
                            <label for="inputField"> {{ __('VAT') }} </label>
                            <div class="input-group input-group-sm mt-1">
                                <input type="text" class="form-control bg-secondary-light" id="inputField2"
                                    wire:model="vat" aria-label="Small" aria-describedby="inputGroup-sizing-sm"
                                    readonly="">
                                <div class="input-group-prepend">
                                    <span
                                        class="input-group-text rounded-0 rounded-end-1 text-black-50 bg-secondary-light"
                                        id="inputGroup-sizing-sm">$</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="form-group mt-2">
                    <label for="inputField"> {{ __('Offer details') }} </label>
                    <div class="input-group">
                        <textarea class="form-control border rounded-1 border-secondary-subtle" name="" id="" cols="100"
                            wire:model="proposal" rows="10" readonly></textarea>
                    </div>
                </div>
            </div>
        </div>
    @endif


</div>

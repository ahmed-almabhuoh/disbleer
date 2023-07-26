<div class="row">

    <h3 class="fw-bold pb-2">{{ __('Published Jobs') }}</h3>

    <div class="  filter--container_sidebar col-md-3 outside" id="filter-sidebar">


        <div class="sidebar-filters card-body bg-white ">
            <div class="row">
                <div class="col-xs-12  input__wrapper ">
                    <div class="form-group ">
                        <label for="project__keyword"> {{ __('Search') }} </label>
                        <input class="form-control" id="project__title" wire:model="searchTerm" data-filter="keyword"
                            name="keyword" type="text" fdprocessedid="3gemmp">
                    </div>
                </div>


                <div class=" col-xs-12  input__wrapper ">
                    <div class="form-group ">
                        <label class=" mt-2 mb-3" for="project__category"> {{ __('Category') }} </label>

                        <div class="form-check mb-2">
                            <label>
                                <input type="checkbox" name="" id="project__category_business"
                                    wire:model="fullTime" data-ui="" data-filter="category" value="business">
                                <span class="label-text"> {{ __('Full Time') }} </span>
                            </label>
                        </div>

                        <div class="form-check mb-2">
                            <label>
                                <input type="checkbox" name="" id="project__category_business"
                                    wire:model="partTime" data-ui="" data-filter="category" value="business">
                                <span class="label-text"> {{ __('Part Time') }} </span>
                            </label>
                        </div>

                        <label class=" mt-2 mb-3" for="project__category"> {{ __('Pricing') }} </label>

                        <div class="form-check mb-2">
                            <label>
                                {{ __('From Price') }}
                                <input type="number" name="" id="project__category_business"
                                    class="form-control" wire:model="fromPrice" data-ui="" data-filter="category"
                                    value="business">
                            </label>
                        </div>

                        <div class="form-check mb-2">
                            <label>
                                {{ __('To Price') }}
                                <input type="number" name="" id="project__category_business"
                                    class="form-control" wire:model="toPrice" data-ui="" data-filter="category"
                                    value="business">
                            </label>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        </form>
    </div>

    <div class="col-md-9">

        @if (!count($jobs))
            <div class="d-flex flex-column gap-5 mb-2">
                <h5 class="card-title"> {{ __('No jobs found !!') }} </h5>
            </div>
        @endif

        @foreach ($jobs as $job)
            <div class="d-flex flex-column gap-5 mb-2">
                <div class="card">
                    <div class="card-header">{{ $job->supervisor ? $job->supervisor->name : __('Manager') }}</div>
                    <div class="card-body">
                        <h5 class="card-title"> {{ $job->title }} </h5>
                        {{ Str::limit(ucfirst($job->description), 150, '...') }}
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <div class="justify-content-start">
                            @php
                                $tags = $job->tags;
                                $tagsStr = '';
                                foreach ($tags as $tag) {
                                    $tagsStr .= ' ' . $tag->tag;
                                }
                            @endphp

                            @if ($tagsStr)
                                {{ __('Keyword') }}: {{ $tagsStr }} |
                                {{ $job->from_date . ' - ' . $job->to_date }} |
                                {{ $job->started_salary . '$' . ' - ' . $job->end_salary . '$' }}
                            @else
                                {{ $job->from_date . ' - ' . $job->to_date }} |
                                {{ $job->started_salary . '$' . ' - ' . $job->end_salary . '$' }}
                            @endif
                        </div>
                        <div class="justify-content-end">
                            <a class="btn bg-primary text-white" wire:click="jobDetails('{{ $job->slug }}')">
                                {{ __('Add Offer') }} </a>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach


    </div>


</div>

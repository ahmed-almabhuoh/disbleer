@extends('frontend.layouts.app')

@section('title', __('Job Details: ') . $job->title)
@section('category', __('Proposals'))
@section('index', 'Job Details: ' . $job->title)

@section('styles')

@endsection

@section('content')
    <div class="d-flex justify-content-between gap-3">
        <div class="col-md-8">
            <div class="card-body bg-white mb-2">
                <div>
                    <h5 class="tilte">
                        {{ $job->title }}
                    </h5>
                    <hr>
                    <code style="font-family: sans-serif; font-size: 16px; color: black;">
                        {{ $job->description }}
                    </code>

                    <div class="container mt-5">
                        <h3>{{ __('Uploaded Files') }}</h3>
                        <div class="uploaded-files mt-3">

                            @php
                                $counter = 1;
                            @endphp

                            @if (!is_null($job->files))
                                @foreach (json_decode($job->files) as $file)
                                    <div class="file">

                                        <a href="{{ Storage::url($file) }}"><span
                                                class="file-name">{{ __('File') . ' ' . $counter }}</span></a>
                                    </div>

                                    @php
                                        ++$counter;
                                    @endphp
                                @endforeach
                            @endif


                        </div>
                    </div>


                </div>
            </div>



            @if (count($job->tags))
                <div class="card-body bg-white mb-2">
                    <h5> {{ __('Tags') }} </h5>
                    <hr>
                    <div class="d-flex flex-wrap gap-1">
                        @foreach ($job->tags as $tag)
                            <span class="bg-primary text-white rounded-1 py-1 px-2 ">{{ $tag->tag }}</span>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Start Add your offer now -->
            <livewire:frontend.client-v1.submit-proposal :job="$job" />
            <!-- End Add your offer now -->


        </div>
        <div class="col-md-4">
            <div class="card-body bg-white mb-2">
                <div>
                    <h5 class="tilte">
                        {{ $job->title . ' | ' . $job->slug }}
                    </h5>
                    <hr>

                    <div class="project-details">
                        Status <span class="badge bg-success"> {{ $job->status }} </span><br>
                        Posted: <span class="text-black-50"> {{ $job->created_at->diffForHumans() }} </span><br>
                        Budget: <span class="text-black-50">${{ $job->started_salary }} -
                            ${{ $job->end_salary }}</span><br>
                        Duration: <span class="text-black-50">{{ $job->from_date . ' - ' . $job->to_date }} </span><br>
                        Average bids are: <span class="text-black-50">${{ $avg }}</span><br>
                        Number: <span class="text-black-50"> {{ $number }} </span><br>
                        DIST: <span class="text-black-50"> {{ $job->dist_count }} </span><br>
                    </div>




                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Link to Bootstrap JS and jQuery (for Bootstrap features like dropdowns, etc.) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection

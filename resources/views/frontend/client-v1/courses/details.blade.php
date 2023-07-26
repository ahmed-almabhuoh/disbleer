@extends('frontend.layouts.app')

@section('title', $course->name)
@section('category', $course->name)
@section('index', 'CMS')

@section('styles')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
@endsection

@section('content')
    <div class="main-section ">

        <div class="container ">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div id="courseCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#courseCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#courseCarousel" data-slide-to="1"></li>
                            <!-- Add more carousel items if needed -->
                        </ul>

                        <!-- Slides -->
                        <div class="carousel-inner">
                            @if ($course->images)
                                @php
                                    $images = json_decode($course->images);
                                @endphp
                                @foreach ($images as $index => $imagePath)
                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                        <img src="{{ Storage::url($imagePath) }}" class="d-block w-100"
                                            alt="Literature {{ $index + 1 }}">
                                        <div class="carousel-caption">
                                            <h3>{{ $course->indicate }}</h3>
                                            <p>{{ $course->name }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <!-- Controls -->
                        <a class="carousel-control-prev" href="#courseCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only"> {{ __('Previous') }} </span>
                        </a>
                        <a class="carousel-control-next" href="#courseCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only"> {{ __('Next') }} </span>
                        </a>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body">
                            <h2 class="card-title"> {{ $course->name }} </h2>
                            <p class="card-text">
                                {{ $course->description }}
                            </p>
                            <p class="card-text">Duration: 8 weeks</p>
                            <p class="card-text">{{ __('Instructor') }}: {{ $course->indicate }}</p>
                            <p class="card-text">Price: $99</p>
                            <p class="card-text">{{ __('About') }}: {{ $course->created_at->diffForHumans() }}</p>

                            <!-- Related Blogs Section -->
                            <h4 class="card-title"> {{ $course->name }} </h4>
                            <p class="card-text">
                                {{ $course->blog }}
                            </p>

                            <!-- Enroll button -->
                            @if (auth()->user()->courses()->where('courses.id', $course->id)->exists())
                                <a href="{{ $course->link }}" class="btn btn-primary btn-block"> {{ __('Go To Course!') }}
                                </a>
                            @else
                                <a href="{{ route('clientv1.courses.enrol', Crypt::encrypt($course->id)) }}"
                                    class="btn btn-primary btn-block"> {{ __('Enroll Now!') }} </a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
@endsection

@section('scripts')
    <!-- Bootstrap JS (Place it before the closing </body> tag for faster page load) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection

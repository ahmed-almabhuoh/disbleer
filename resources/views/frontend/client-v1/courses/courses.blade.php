@extends('frontend.layouts.app')

@section('title', __('Courses'))
@section('category', __('Courses'))
@section('index', 'CMS')

@section('styles')

@endsection

@section('content')
    <div class="main-section ">

        @if (session('message'))
            <div class="alert alert-{{ session('class') }}" role="alert">
                {{ session('message') }}
            </div>
        @endif


        <h3 class="fw-bold d-flex gap-2 flex-wrap "> {{ __('My Courses') }} </h3>
        <div class="my-courses d-flex gap-4 flex-wrap  rounded-2 pb-3">
            {{-- <div class="my-courses d-flex gap-4 flex-wrap  rounded-2 pb-3"> --}}

            @foreach ($disable_courses as $course)
                @php
                    $firstImage = '';
                    if (!is_null($course->images)) {
                        $firstImage = json_decode($course->images)[0];
                    }
                @endphp
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ Storage::url($firstImage) }}" alt="Unsplash">
                        <div class="card-header">
                            <h5 class="card-title mb-0"> {{ $course->name }} </h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                {{ Str::limit(ucfirst($course->description), 75, '...') }}
                            </p>
                            <a href="{{ route('clientv1.courses.details', $course->slug) }}" class="btn btn-primary">
                                {{ __('More Details') }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>

        <hr>

        <h3 class="fw-bold p-2 "> {{ __('All Courses') }} </h3>

        <div class="d-flex gap-4 flex-wrap ">

            @foreach ($courses as $course)
                @php
                    $courseImage = '';
                    if (!is_null($course->images)) {
                        $courseImage = json_decode($course->images)[0];
                    }
                @endphp
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card">
                        @if (!is_null($courseImage))
                            <img class="card-img-top" src="{{ Storage::url($courseImage) }}" alt="Unsplash">
                        @endif
                        <div class="card-header">
                            <h5 class="card-title mb-0"> {{ ucfirst($course->name) }} <small> {{ ' - ' . $course->type }}
                                </small>
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                {{ Str::limit(ucfirst($course->description), 75, '...') }}
                            </p>
                            <a href="{{ route('clientv1.courses.details', $course->slug) }}" class="btn btn-primary">
                                {{ __('More Details') }} </a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        {{ $courses->links() }}




    </div>
@endsection

@section('scripts')

@endsection

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

        {{-- <h3 class=" "> {{ __('Current Courses') }} </h3>
        <div class="d-flex flex-wrap gap-3 mb-5">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                    <img class="card-img-top"
                        src="./assets/img/courses/top-view-young-businesswoman-working-her-laptop-table-along-with-phone-graphics-job-activities-technology.jpg"
                        alt="Unsplash">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Data-Entry Course</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">In this course, we present the basics of learning front-end programming.</p>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100">
                                <div class="spinner-border first text-light" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                25%
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                    <img class="card-img-top" src="./assets/img/courses/uiuxx.jpg" alt="Unsplash">
                    <div class="card-header">
                        <h5 class="card-title mb-0">UIUX Course</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">In this course, we present the basics of learning front-end programming.</p>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="70"
                                aria-valuemin="0" aria-valuemax="100">
                                <div class="spinner-border text-light" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                70%
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}



        <h3 class="fw-bold d-flex gap-2 flex-wrap "> {{ __('My Courses') }} </h3>
        <div class="my-courses d-flex gap-4 flex-wrap  rounded-2 pb-3">

            @foreach ($disable_courses as $course)
                @php
                    $firstImage = json_decode($course->images)[0];
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
                    $courseImage = json_decode($course->images)[0];
                @endphp
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ Storage::url($courseImage) }}" alt="Unsplash">
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

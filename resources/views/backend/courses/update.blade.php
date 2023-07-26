@extends('backend.cpanel')

@section('title', $course->name)
@section('category', $course->name)
@section('index', __('CMS'))

@section('styles')

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> {{ __('Update: ') . $course->name }} </h5>

            <livewire:backend.courses.update :course="$course" />

        </div>
    </div>
@endsection

@section('scripts')

@endsection

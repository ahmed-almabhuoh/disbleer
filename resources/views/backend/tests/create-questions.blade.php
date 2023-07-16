@extends('backend.cpanel')

@section('title', __('Create Question For ') . $test->subject)
@section('category', __('Questions'))
@section('index', __('CMS'))

@section('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> {{ __('Create Question For ') . $test->subject }} </h5>

            <livewire:backend.tests.craete-questions :test="$test" />

        </div>
    </div>
@endsection

@section('scripts')

@endsection

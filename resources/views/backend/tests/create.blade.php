@extends('backend.cpanel')

@section('title', __('Tests'))
@section('category', __('Tests'))
@section('index', __('CMS'))

@section('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> {{ __('Add new test') }} </h5>

            <livewire:backend.tests.create-test />

        </div>
    </div>
@endsection

@section('scripts')

@endsection

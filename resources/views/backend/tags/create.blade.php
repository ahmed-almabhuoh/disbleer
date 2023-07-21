@extends('backend.cpanel')

@section('title', __('Tags'))
@section('category', __('Tags'))
@section('index', __('CMS'))

@section('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> {{ __('Add new tag') }} </h5>

            <livewire:backend.tags.create-tag />

        </div>
    </div>
@endsection

@section('scripts')

@endsection

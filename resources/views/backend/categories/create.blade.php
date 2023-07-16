@extends('backend.cpanel')

@section('title', __('Categories'))
@section('category', __('Categories'))
@section('index', __('CMS'))

@section('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> {{ __('Add new category') }} </h5>

            <livewire:backend.categories.create-category />

        </div>
    </div>
@endsection

@section('scripts')

@endsection

@extends('backend.cpanel')

@section('title', $category->name)
@section('category', $category->name)
@section('index', __('CMS'))

@section('styles')

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> {{ __('Update: ') . $category->name }} </h5>

            <livewire:backend.categories.update :category="$category" />

        </div>
    </div>
@endsection

@section('scripts')

@endsection

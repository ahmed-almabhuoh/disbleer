@extends('backend.cpanel')

@section('title', $tag->name)
@section('category', $tag->name)
@section('index', __('CMS'))

@section('styles')

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> {{ __('Update: ') . $tag->name }} </h5>

            <livewire:backend.tags.update :tag="$tag" />

        </div>
    </div>
@endsection

@section('scripts')

@endsection

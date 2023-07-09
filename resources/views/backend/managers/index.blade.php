@extends('backend.cpanel')

@section('title', __('Managers'))
@section('category', __('Managers'))
@section('index', __('HR'))

@section('styles')

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ __('Show all managers') }}</h5>

            <livewire:backend.managers.index />

        </div>
    </div>
@endsection

@section('scripts')

@endsection

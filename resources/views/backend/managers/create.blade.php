@extends('backend.cpanel')

@section('title', __('Managers'))
@section('category', __('Managers'))
@section('index', __('HR'))

@section('styles')

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> {{ __('Add new manager') }} </h5>

            <livewire:backend.create-manager />

        </div>
    </div>
@endsection

@section('scripts')

@endsection

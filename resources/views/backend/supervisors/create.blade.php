@extends('backend.cpanel')

@section('title', __('Supervisors'))
@section('category', __('Supervisors'))
@section('index', __('HR'))

@section('styles')

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> {{ __('Add new supervisor') }} </h5>

            <livewire:backend.supervisors.create-supervisor />

        </div>
    </div>
@endsection

@section('scripts')

@endsection

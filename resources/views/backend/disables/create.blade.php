@extends('backend.cpanel')

@section('title', __('Disables'))
@section('category', __('Disables'))
@section('index', __('HR'))

@section('styles')

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> {{ __('Add new disable') }} </h5>

            <livewire:backend.disables.create-disable />

        </div>
    </div>
@endsection

@section('scripts')

@endsection

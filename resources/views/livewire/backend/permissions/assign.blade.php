@extends('backend.cpanel')

@section('title', __('Roles'))
@section('category', __('Roles'))
@section('index', __('CMS'))

@section('styles')

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ __('Show all roles') }}</h5>

            <livewire:backend.roles.assign :role-id="$id" />

        </div>
    </div>
@endsection

@section('scripts')

@endsection

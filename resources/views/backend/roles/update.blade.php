@extends('backend.cpanel')

@section('title', $role->name)
@section('category', $role->name)
@section('index', __('CMS'))

@section('styles')

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> {{ __('Update: ') . $role->name }} </h5>

            <livewire:backend.roles.update :role="$role" />

        </div>
    </div>
@endsection

@section('scripts')

@endsection

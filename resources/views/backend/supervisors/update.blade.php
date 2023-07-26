@extends('backend.cpanel')

@section('title', $supervisor->name)
@section('category', $supervisor->name)
@section('index', __('HR'))

@section('styles')

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> {{ __('Update: ') . $supervisor->name }} </h5>

            <livewire:backend.supervisors.update :supervisor="$supervisor" />

        </div>
    </div>
@endsection

@section('scripts')

@endsection

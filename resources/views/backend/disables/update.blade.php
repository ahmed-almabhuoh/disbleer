@extends('backend.cpanel')

@section('title', $disable->name)
@section('category', $disable->name)
@section('index', __('HR'))

@section('styles')

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> {{ __('Update: ') . $disable->name }} </h5>

            <livewire:backend.disables.update :disable="$disable" />

        </div>
    </div>
@endsection

@section('scripts')

@endsection

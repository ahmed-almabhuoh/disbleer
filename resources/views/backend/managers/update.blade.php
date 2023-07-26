@extends('backend.cpanel')

@section('title', $manager->name)
@section('category', $manager->name)
@section('index', __('HR'))

@section('styles')

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> {{ __('Update: ') . $manager->name }} </h5>

            <livewire:backend.managers.update :manager="$manager" />

        </div>
    </div>
@endsection

@section('scripts')

@endsection

@extends('backend.cpanel')

@section('title', $test->name)
@section('category', $test->name)
@section('index', __('CMS'))

@section('styles')

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> {{ __('Update: ') . $test->name }} </h5>

            <livewire:backend.tests.update :test="$test" />

        </div>
    </div>
@endsection

@section('scripts')

@endsection

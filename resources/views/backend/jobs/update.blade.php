@extends('backend.cpanel')

@section('title', $job->name)
@section('category', $job->name)
@section('index', __('CMS'))

@section('styles')

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> {{ __('Update: ') . $job->title }} </h5>

            <livewire:backend.jobs.update :job="$job" />

        </div>
    </div>
@endsection

@section('scripts')

@endsection

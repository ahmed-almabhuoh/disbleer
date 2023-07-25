@extends('frontend.layouts.app')

@section('title', __('Credits'))
@section('category', __('Credits'))
@section('index', 'CMS')

@section('styles')

@endsection

@section('content')
    <div class="main-section ">

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <livewire:frontend.client-v1.charge-credits />
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')

@endsection

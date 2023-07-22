@extends('frontend.layouts.app')

@section('title', __('Dashboard'))
@section('category', __('Dashboard'))
@section('index', 'CMS')

@section('styles')

@endsection

@section('content')
    <section class="section dashboard">

        <livewire:frontend.client-v1.show-jobs />
    </section>
@endsection

@section('scripts')

@endsection

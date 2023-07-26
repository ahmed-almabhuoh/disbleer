@extends('frontend.layouts.app')

@section('title', __('Proposals'))
@section('category', __('Proposals'))
@section('index', __('Proposals'))

@section('styles')

@endsection

@section('content')
    <livewire:frontend.client-v1.submitted-proposals />
@endsection

@section('scripts')

@endsection

@extends('frontend.layouts.app')

@section('title', __('Conversations'))
@section('category', __('Conversations'))
@section('index', 'CMS')

@section('styles')

@endsection

@section('content')
    <div class="container mt-4">
        <h2> {{ __('User Conversations') }} </h2>

        <livewire:frontend.client-v1.chat.conversations />

    </div>
@endsection

@section('scripts')

@endsection

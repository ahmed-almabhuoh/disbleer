@extends('backend.cpanel')

@section('title', __('Jobs'))
@section('category', __('Jobs'))
@section('index', __('CMS'))

@section('styles')

@endsection

@section('content')
    <div class="container mt-4">
        <h2> {{ __('Start Chatting') }} </h2>

        <livewire:frontend.client-v1.chatting :conversation-id="$conversationId" />

    </div>
@endsection

@section('scripts')

@endsection

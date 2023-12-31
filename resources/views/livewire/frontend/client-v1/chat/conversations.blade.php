<div>
    <!-- Search input field -->
    <div class="form-group">
        <input type="text" class="form-control my-2" id="searchInput" placeholder="{{ __('Search conversations...') }}"
            wire:model="searchTerm">
    </div>

    <div class="list-group">

        @if (!count($conversations))
            <h3>
                <center>
                    {{ __('No chats yet !!') }}
                </center>
            </h3>
        @endif

        @foreach ($conversations as $conversation)
            <a href="{{ route('chats.conversations.create',Crypt::encrypt($conversation->job->proposals()->where('disable_id', '=', auth()->user()->id)->first()->id)) }}"
                class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    @if (!is_null($conversation->supervisor))
                        <h5 class="mb-1">{{ ucfirst($conversation->supervisor->name) }}</h5>
                    @else
                        <h5 class="mb-1">{{ 'N/N' }}</h5>
                    @endif
                    <small> {{ $conversation->updated_at->diffForHumans() }} </small>
                </div>
                <p class="mb-1">
                    @if ($conversation->last_message_id)
                        {{ App\Models\Message::where('id', $conversation->last_message_id)->first()->message }}
                    @else
                        {{ __('No messages yet !!') }}
                    @endif
                </p>
            </a>
        @endforeach

    </div>
</div>

<div>
    <div class="row">
        <div class="col-md-12">
            <div class="chat-box border rounded p-3" style="height: 300px; overflow-y: auto;">
                @foreach ($messages as $_message)
                    @php
                        $name = DB::table($_message->send_type . 's')
                            ->where('id', $_message->sender_id)
                            ->exists()
                            ? DB::table($_message->send_type . 's')
                                ->where('id', $_message->sender_id)
                                ->first()->fname
                            : 'N/N';
                    @endphp

                    <div class="message bg-light p-2 mb-2 rounded">
                        <strong>{{ ucfirst($name) }}:</strong> {{ $_message->message }}
                    </div>
                @endforeach

                @if (!count($messages))
                    <center>
                        <h1>
                            {{ __('No messages yet ... !!') }}
                        </h1>
                    </center>
                @endif
                <!-- Add more chat messages here if needed -->
            </div>
            <div class="input-box mt-4">
                <input type="text" class="form-control @error('messageStored')  is-invalid @enderror"
                    placeholder="{{ __('Type your message...') }}" wire:model="messageStored">
                @error('messageStored')
                    <div class="invalid-feedback">
                        {{ __(ucfirst($message)) }}
                    </div>
                @enderror
            </div>
            <div class="mt-2">
                <button class="btn btn-primary" wire:click="createMessage"> {{ __('Send') }} </button>
            </div>
        </div>
    </div>
</div>

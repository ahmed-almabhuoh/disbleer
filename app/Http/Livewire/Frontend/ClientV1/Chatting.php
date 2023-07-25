<?php

namespace App\Http\Livewire\Frontend\ClientV1;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class Chatting extends Component
{
    public $conversationId;
    protected $conversation;
    protected $messages;
    public $messageStored;

    public function render()
    {
        $this->conversation = Conversation::where('id', Crypt::decrypt($this->conversationId))->first();
        $this->messages = $this->conversation->messages;

        return view('livewire.frontend.client-v1.chatting', [
            'messages' => $this->messages,
        ]);
    }

    public function rules()
    {
        return [
            'messageStored' => 'required|string',
        ];
    }

    public function createMessage()
    {
        $data = $this->validate();

        $message = Message::create([
            'message' => $data['messageStored'],
            'conversation_id' => Crypt::decrypt($this->conversationId),
            'sender_id' => auth()->user()->id,
            'send_type' => auth('disable')->check() ? 'disable' : 'supervisor',
        ]);

        Conversation::where('id',  Crypt::decrypt($this->conversationId))->update([
            'last_message_id' => $message->id,
        ]);
        $this->render();
        $this->messageStored = null;
    }
}

<?php

namespace App\Http\Livewire\Frontend\ClientV1\Chat;

use App\Models\Conversation;
use Livewire\Component;

class Conversations extends Component
{
    public $searchTerm;
    protected $conversations;

    public function render()
    {
        $this->conversations = Conversation::own()->paginate(10);

        return view('livewire.frontend.client-v1.chat.conversations', [
            'conversations' => $this->conversations,
        ]);
    }
}

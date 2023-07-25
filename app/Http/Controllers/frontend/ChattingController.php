<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Job;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ChattingController extends Controller
{
    //
    public function conversations()
    {
        return response()->view('frontend.client-v1.chatting.conversations');
    }

    public function createConversation($proposalId)
    {
        $proposal = Proposal::where('id', Crypt::decrypt($proposalId))->first();

        $conversation = Conversation::where([
            ['disable_id', '=', $proposal->disable_id],
            ['job_id', '=', $proposal->job_id],
            ['supervisor_id', '=', auth('supervisor')->user()->id],
        ])->first();

        if (!is_null($conversation)) {
            return response()->view('frontend.client-v1.chatting.chat', [
                'conversationId' => Crypt::encrypt($conversation->id),
            ]);
        }

        $conversation = Conversation::create([
            'disable_id' => $proposal->disable_id,
            'job_id' => $proposal->job_id,
            'supervisor_id' => auth('supervisor')->user()->id,
        ]);

        return response()->view('frontend.client-v1.chatting.chat', [
            'conversationId' => Crypt::encrypt($conversation->id),
        ]);
    }
}

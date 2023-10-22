<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ConversationModel;
use App\Models\MessageModel;
use App\Models\UsersModel;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    
    public function listConversations()
    {
        // Get the user ID of the currently authenticated user (assuming you have authentication)
        $userId = auth()->user()->id;

        // Retrieve all conversations for the user
        // $conversations = ConversationModel::whereHas('users', function ($query) use ($userId) {
        //     $query->where('user_id', $userId);
        // })->get();

        $conversations = ConversationModel::get();

        // Your logic for displaying the list of conversations (e.g., a blade view)
        return view('admin.conversations.list', compact('conversations'));
    }

    public function viewConversation($conversationId)
    {
        // Retrieve the conversation and its messages
        $conversation = ConversationModel::findOrFail($conversationId);
        $messages = MessageModel::where('conversation_id', $conversationId)->orderBy('created_at', 'asc')->get();

        // Assuming you have a way to determine the other user's ID in the context of your application
        $otherUserId = $this->getOtherUserId($conversationId); // Replace with your logic
        
        // Retrieve the participant user IDs
        $participantUserIds = $this->getParticipantUserIds($conversationId);

        // Retrieve the other user's information
        $otherUser = UsersModel::find($participantUserIds[0]); // Replace with your logic
        $myUser    = UsersModel::find($participantUserIds[1]); // Replace with your logic
                
        // dd($myUser->name);

        // Your logic for displaying the conversation view (e.g., a blade view)
        return view('admin.conversations.view', compact('conversation', 'messages', 'otherUser', 'myUser', 'participantUserIds'));
    }

    // Function to determine the other user's ID (you should customize this based on your logic)
    private function getOtherUserId($conversationId)
    {
        // Replace this with your logic to determine the other user's ID
        // For example, if the conversation has two users, you can query the conversation's users and exclude the current user
        $conversation = ConversationModel::findOrFail($conversationId);
        $currentUserId = auth()->user()->id;
        $otherUserId = $conversation->users()->where('user_id', '!=', $currentUserId)->first();
        
        return $otherUserId->id; // This assumes that you have a 'users' relationship defined in your Conversation model
    }
    
    // Function to get the participant user IDs
    private function getParticipantUserIds($conversationId)
    {
        // Retrieve the conversation participants' user IDs excluding the current user
        $currentUserId = auth()->user()->id;
        
        $participantUserIds = ConversationModel::find($conversationId)
            ->users()
            ->where('user_id', '!=', $currentUserId)
            ->pluck('user_id')
            ->toArray();

        return $participantUserIds;
    }

}

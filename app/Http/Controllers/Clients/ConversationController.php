<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\ConversationModel;
use App\Models\MessageModel;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConversationController extends Controller
{
    
    public function initiateConversation(Request $request)
    {
        // Get the user ID of the current user (assuming you have authentication set up)
        $userId = auth()->user()->id;

        // Get the user ID of the other user (replace this with your logic to get the other user ID)
        $otherUserId = $request->input('other_user_id');

        // Check if a conversation between the two users already exists
        $existingConversation = DB::table('conversation_user')
            ->whereIn('user_id', [$userId, $otherUserId])
            ->groupBy('conversation_id')
            ->havingRaw('COUNT(DISTINCT user_id) = 2')
            ->pluck('conversation_id')
            ->first();

        if ($existingConversation) {
            // If an existing conversation is found, redirect to the conversation view
            return redirect()->route('client.conversation.view', ['conversationId' => $existingConversation]);
        }

        // If no existing conversation is found, create a new conversation
        $conversation = new ConversationModel();
        $conversation->save();

        // Get the ID of the newly created conversation
        $conversationId = $conversation->id;

        // Add the current user to the conversation
        DB::table('conversation_user')->insert([
            'user_id' => $userId,
            'conversation_id' => $conversationId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Add the other user to the conversation
        DB::table('conversation_user')->insert([
            'user_id' => $otherUserId,
            'conversation_id' => $conversationId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect to the conversation view
        return redirect()->route('client.conversation.view', ['conversationId' => $conversationId]);
    }

    public function listConversations()
    {
        // Get the user ID of the currently authenticated user (assuming you have authentication)
        $userId = auth()->user()->id;

        // Retrieve all conversations for the user
        $conversations = ConversationModel::whereHas('users', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();

        // Your logic for displaying the list of conversations (e.g., a blade view)
        return view('clients.conversations.list', compact('conversations'));
    }

    public function viewConversation($conversationId)
    {
        // Retrieve the conversation and its messages
        $conversation = ConversationModel::findOrFail($conversationId);
        $messages = MessageModel::where('conversation_id', $conversationId)->orderBy('created_at', 'asc')->get();

        // Assuming you have a way to determine the other user's ID in the context of your application
        $otherUserId = $this->getOtherUserId($conversationId); // Replace with your logic
                
        // Retrieve the other user's information
        $otherUser = UsersModel::find($otherUserId); // Replace with your logic
        $myUser = UsersModel::find(auth()->user()->id); // Replace with your logic
        
        // dd($myUser->name);

        // Your logic for displaying the conversation view (e.g., a blade view)
        return view('clients.conversations.view', compact('conversation', 'messages', 'otherUser', 'myUser'));
    }

    public function sendMessage(Request $request, $conversationId)
    {
        // Validate the request (e.g., message content validation)

        // Get the user ID of the sender (assuming you have authentication)
        $userId = auth()->user()->id;

        // Create a new message
        MessageModel::create([
            'user_id' => $userId,
            'conversation_id' => $conversationId,
            'content' => $request->input('content'), // Replace 'content' with your message input field name
            'type' => 'text', // or 'image' if applicable
        ]);

        // Redirect back to the conversation view after sending the message
        return redirect()->route('client.conversation.view', ['conversationId' => $conversationId]);
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
    
}

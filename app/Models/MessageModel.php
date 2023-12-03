<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageModel extends Model
{
    use HasFactory;

    protected $table = 'messages';
        
    /**
     * The primary key associated with the table.
     *
     * @var int
     */
    protected $primaryKey = 'id';

    protected $fillable = ['user_id', 'conversation_id', 'content', 'type'];

    /**
     * Get the user who sent this message.
     */
    public function user()
    {
        return $this->belongsTo(UsersModel::class)->withTrashed();
    }

    /**
     * Get the conversation to which this message belongs.
     */
    public function conversation()
    {
        return $this->belongsTo(ConversationModel::class)->withTrashed();
    }
}

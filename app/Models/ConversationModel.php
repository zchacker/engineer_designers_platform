<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConversationModel extends Model
{
    use HasFactory;

    protected $table = 'conversations';
    
    
    /**
     * The primary key associated with the table.
     *
     * @var int
     */
    protected $primaryKey = 'id';

    protected $fillable = [];

    /**
     * Get the users participating in this conversation.
     */
    public function users()
    {
        //return $this->belongsToMany(UsersModel::class)->withTimestamps();
        return $this->belongsToMany(UsersModel::class, 'conversation_user', 'conversation_id', 'user_id');
    }

    /**
     * Get the messages in this conversation.
     */
    public function messages()
    {
        return $this->hasMany(MessageModel::class, 'conversation_id');
    }
}

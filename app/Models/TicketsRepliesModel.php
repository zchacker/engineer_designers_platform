<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class TicketsRepliesModel extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $table = 'ticket_replies';
    
    
    /**
     * The primary key associated with the table.
     *
     * @var int
     */
    protected $primaryKey = 'id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<string, string>
     */
    protected $fillable = [
        'ticket_id',
        'reply',        
        'user_id',
    ];    

    public function user()
    {
        return $this->hasOne(UsersModel::class, 'id', 'user_id')->withTrashed();
    }

    public function ticket()
    {
        return $this->hasOne(TicketsModel::class, 'id', 'ticket_id')->withTrashed();
    }

}

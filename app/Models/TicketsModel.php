<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class TicketsModel extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $table = 'tickets';
    
    
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
        'subject',
        'message',
        'status',
        'image_file',
        'user_id',
    ];

    protected $enumStatus = [
        'oepn',
        'closed',        
    ]; // Define ENUM values

    public function user()
    {
        return $this->hasOne(UsersModel::class, 'id', 'user_id')->withTrashed();
    }
    
}

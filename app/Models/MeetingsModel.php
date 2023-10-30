<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class MeetingsModel extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $table = 'meetings';
        
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
        'title',
        'description',
        'engineer_id',
        'user_id',
        'meeting_link',
        'meet_date'
    ];

    public function user_data()
    {
        return $this->hasOne(UsersModel::class, 'id' , 'user_id');
    }

    public function engineer_data()
    {
        return $this->hasOne(UsersModel::class, 'id' , 'engineer_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class EngineerAvatarModel extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $table = 'engineer_avatar';
        
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
        'user_id',
        'file_id',              
    ];

    public function user()
    {
        return $this->belongsTo(UsersModel::class , 'id', 'user_id');
    }

    public function file()
    {
        return $this->belongsTo(FilesModel::class , 'id', 'file_id');
    }

    public function image()
    {
        return $this->hasOne(FilesModel::class, 'id', 'file_id');
    }

}

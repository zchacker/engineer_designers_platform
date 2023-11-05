<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class OrdersModel extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $table = 'orders';
    
    
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
        'details',
        'file_id',
        'user_id',
        'to_user_id',
        'status'
    ];

    protected $enumStatus = ['pending','under_review', 'supervisor_review','rejected','completed']; // Define ENUM values

    public function image()
    {
        return $this->hasOne(FilesModel::class, 'id', 'file_id');
    }

    public function user_data()
    {
        return $this->hasOne(UsersModel::class, 'id' , 'user_id');
    }

    public function engineer_data()
    {
        return $this->hasOne(UsersModel::class, 'id' , 'to_user_id');
    }

}

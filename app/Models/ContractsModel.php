<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class ContractsModel extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $table = 'contracts';
    
    
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
        'file_id',
        'user_id',
        'engineer_id',
        'order_id',
        'status',        
    ];
    
    protected $enumStatus = ['accepted','rejected','canceled','pending']; // Define ENUM values

    public function user_data()
    {
        return $this->hasOne(UsersModel::class, 'id' , 'user_id');
    }

    public function engineer_data()
    {
        return $this->hasOne(UsersModel::class, 'id' , 'engineer_id');
    }

    public function order_data()
    {
        return $this->hasOne(OrdersModel::class, 'id' , 'order_id');
    }

    public function contractDoc()
    {
        return $this->hasOne(FilesModel::class, 'id' , 'file_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class OrderFeedbackModel extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $table = 'orders_feedback';
    
    
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
        'order_id',
        'user_id',
        'type',
        'show_to_client',
        'show_to_engineer',
        'comment',        
    ];

    protected function order_data()
    {
        return $this->hasOne(OrdersModel::class , 'id', 'order_id');
    }

    public function user_data()
    {
        return $this->hasOne(UsersModel::class , 'id', 'user_id');
    }

    public function feedback_files()
    {
        return $this->hasMany(OrderFeedbackFilesModel::class , 'feedback_id', 'id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class ContractFeedbackModel extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $table = 'contract_feedback';
    
    
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
        'contract_id',
        'status',
        'comment',
        'user_id',
    ];
    
    protected $enumStatus = ['accepted','rejected']; // Define ENUM values
    

    public function user_data()
    {
        return $this->hasOne(UsersModel::class, 'id' , 'user_id')->withTrashed();
    }   

    public function contractDoc()
    {
        return $this->hasOne(FilesModel::class, 'id' , 'file_id')->withTrashed();
    }
}

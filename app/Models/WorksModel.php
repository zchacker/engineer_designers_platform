<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class WorksModel extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $table = 'works';
    
    
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
        'engineer_id',
        'title',
        'description'
    ];

    public function engineer()
    {
        return $this->hasOne(UsersModel::class, 'id', 'engineer_id');
    }
}

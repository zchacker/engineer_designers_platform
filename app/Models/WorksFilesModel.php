<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class WorksFilesModel extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $table = 'works_files';
    
    
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
        'work_id',
        'file_id'
    ];

    public function file()
    {
        return $this->hasOne(FilesModel::class, 'id', 'file_id');
    }
   
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class ServicesModel extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $table = 'services';
    
    
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
        'name',
        'description',
        'type',
        'url',
        'image_file',
    ];

    protected $enumStatus = [
        'internal',
        'external',        
    ]; // Define ENUM values

    public function file()
    {
        return $this->hasOne(FilesModel::class, 'id', 'image_file')->withTrashed();
    }

}

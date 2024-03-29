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
        'title_en',
        'description',
        'description_en',
        'publish'
    ];

    public function engineer()
    {
        return $this->hasOne(UsersModel::class, 'id', 'engineer_id')->withTrashed();
    }

    public function worksFiles()
    {
        return $this->hasMany(WorksFilesModel::class, 'work_id', 'id')->withTrashed();
    }
}

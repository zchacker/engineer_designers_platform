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
        'name_en',
        'description_en',
        'sub_title',
        'sub_title_en',
        'about_service',
        'about_service_en',
        'about_plus',
        'about_plus_en',
        'cta',
        'cta_en',
        'sub_cta',
        'sub_cta_en',
        'hero_img_file_id',
        'about_img_file_id',
        'video_file_id',
        'cta_img_file_id',
        'cover_img_alt',
        'about_img_alt',
        'type',
        'cta_url',
        'cover_image_file',
        'slug_ar',
        'slug_en'
    ];

    protected $enumStatus = [
        'internal',
        'external',
    ]; // Define ENUM values

    public function file()
    {
        return $this->hasOne(FilesModel::class, 'id', 'cover_image_file')->withTrashed();
    }

    public function hero_img()
    {
        return $this->hasOne(FilesModel::class, 'id', 'hero_img_file_id')->withTrashed();
    }

    public function about_img()
    {
        return $this->hasOne(FilesModel::class, 'id', 'about_img_file_id')->withTrashed();
    }

    public function cta_img()
    {
        return $this->hasOne(FilesModel::class, 'id', 'cta_img_file_id')->withTrashed();
    }

    public function video_file()
    {
        return $this->hasOne(FilesModel::class, 'id', 'video_file_id')->withTrashed();
    }
}

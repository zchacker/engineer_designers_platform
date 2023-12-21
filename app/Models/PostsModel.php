<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class PostsModel extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $table = 'posts';
        
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
        'cover_image',
        'title',
        'body',
        'slug',
        'language',
        'related_post',
        'keywords',
        'seo_title',
        'seo_description',
        'auther_id'
    ];

    protected $enumLanguage = [
        'ar',
        'en',
    ]; // Define ENUM values

    public function auther()
    {
        return $this->hasOne(UsersModel::class , 'id' , 'auther_id');
    }

}

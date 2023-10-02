<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class FilesModel extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $table = 'files';
    
    
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
        'fileName',
        'hash',
        'storage_driver',        
    ];
    

    public function fileName(): Attribute
    {        
        return Attribute::make(
            get: fn($value) => $this->cloudUrl($value)            
        );
    }

    protected function cloudUrl($path) : String 
    {            
        if($this->storage_driver == 'contabo'){
            return config('filesystems.disks.contabo.url') . $path;
        }else{
            return Storage::disk($this->storage_driver)->url($path);
            // return config('filesystems.disks.public.url') . $path;
        }
    }
}

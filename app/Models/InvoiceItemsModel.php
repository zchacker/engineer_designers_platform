<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class InvoiceItemsModel extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $table = 'invoice_items';    
    
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
        'invoice_id',
        'description',
        'quantity',        
        'price',        
        'amount'       
    ];
}

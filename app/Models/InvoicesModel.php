<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class InvoicesModel extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $table = 'invoices';    
    
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
        'client_name',
        'order_id',
        'invoice_number',
        'invoice_date',
        'due_date',
        'tax',
        'discount',
        'discount_type',
        'total_amount',
        'status',
    ];
    
    public function items()
    {
        return $this->hasMany(InvoiceItemsModel::class, 'invoice_id' , 'id');
    }

    public function order_data()
    {
        return $this->hasOne(OrdersModel::class, 'id' , 'order_id');
    }
    
}

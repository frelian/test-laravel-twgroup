<?php

namespace App\Models;

use App\CalculateTotalCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'name',
        'quantity',
        'price',
    ];

    public function invoices()
    {
        return $this->belongsTo(Invoice::class);
    }

}

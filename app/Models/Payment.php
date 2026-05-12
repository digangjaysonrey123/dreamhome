<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'Payment';
    protected $primaryKey = 'paymentID';
    public $timestamps = false;

    protected $fillable = [
        'leaseNo', 'paymentDate', 'amount', 'paymentType',
        'paymentMethod', 'status', 'notes', 'receivedBy'
    ];
}
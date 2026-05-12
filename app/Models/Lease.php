<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lease extends Model
{
    protected $table = 'Lease';
    protected $primaryKey = 'leaseNo';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'leaseNo', 'propertyNo', 'renterNo', 'staffNo',
        'rentStart', 'rentFinish', 'monthlyRent', 'rentalDeposit',
        'depositPaid', 'paymentMethod', 'status'
    ];
}
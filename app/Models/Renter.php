<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Renter extends Model
{
    protected $table = 'Renter';
    protected $primaryKey = 'renterNo';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'renterNo', 'fName', 'lName', 'street', 'area', 'city',
        'postcode', 'telNo', 'prefType', 'maxRent', 'seenBy',
        'seenDate', 'generalComment', 'branchNo'
    ];
}
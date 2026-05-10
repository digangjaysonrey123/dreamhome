<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PropertyForRent extends Model
{
    protected $table = 'PropertyForRent';
    protected $primaryKey = 'propertyNo';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'propertyNo', 'street', 'area', 'city', 'postcode',
        'type', 'rooms', 'monthlyRent', 'status', 'withdrawDate',
        'staffNo', 'branchNo'
    ];
}
<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Staff extends Model
{
    protected $table = 'Staff';
    protected $primaryKey = 'staffNo';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'staffNo', 'fName', 'lName', 'street', 'area', 'city',
        'postcode', 'telNo', 'sex', 'DOB', 'NIN', 'position',
        'salary', 'dateStart', 'typingSpeed', 'carAllowance',
        'bonusPayment', 'branchNo', 'supervisorNo'
    ];
}
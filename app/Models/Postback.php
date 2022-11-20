<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postback extends Model
{
    use HasFactory;

    protected $table = 'postback';

    protected $fillable = [
        'typeID',
        'clickID',
        'companyID',
        'companyType',
        'transactionID',
        'amount'
    ];
}

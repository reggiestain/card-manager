<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    protected $fillable = ['id','app_no','cert_no','issued_date','expiry_date','lic_cat'];
}

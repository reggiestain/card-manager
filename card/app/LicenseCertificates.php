<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LicenseCertificates extends Model
{
    protected $fillable = ['id','license_id','cert'];
}

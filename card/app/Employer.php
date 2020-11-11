<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $fillable = ['id','employee_id','emp_name','emp_email','contact_person','contact_number','s_start_date','s_end_date'];
}

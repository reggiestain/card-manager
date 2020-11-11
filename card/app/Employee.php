<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','institution_id','license_id','name','surname','email', 'gender','mobile',
                           'id_number','user_id','profile_image','nationality','birth_date'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class, 'institution_id', 'id');
    }

    public function license()
    {
        return $this->belongsTo(License::class, 'license_id', 'id');
    }

    public function employer()
    {
        return $this->hasMany(Employer::class);
    }
}

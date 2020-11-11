<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','email', 'contact_person'];

    public function user() {

        return $this->belongsTo(User::class,'user_id','id');
    }

}

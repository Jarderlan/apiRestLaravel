<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['title', 'description', 'local', 'remote', 'type', 'companies_id'];

    protected $dates = ['deleted_at'];

    function company()
    {
        return $this->belongsTo('App/Company');
    }
}

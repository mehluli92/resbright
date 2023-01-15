<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmploymentDetails extends Model
{
    protected $fillable = [
        'company', 'position',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

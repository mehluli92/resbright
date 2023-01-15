<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Destination extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'address1', 'address2','country',
    ];

    public function rb_file()
    {
        return $this->belongsTo('App\RbFile');
    }
}

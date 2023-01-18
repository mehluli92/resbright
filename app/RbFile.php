<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RbFile extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'document','ref', 'entry_number','import', 'supplier', 'description',
        'bill_of_lading', 'tarrif', 'weight','quantity_of_boxes', 
         'manifest','container', 'importer', 
    ];

    //user relationship
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    //price relationship
    public function price()
    {
        return $this->hasOne('App\Price');
    }

    //destination relationship
    public function destination()
    {
        return $this->hasOne('App\Destination');
    }

     //payment relationship 
     public function payment()
     {
        return $this->hasOne('App\Payment');
     }

      //status relationship 
      public function status()
      {
         return $this->hasOne('App\Status'); 
      }
}

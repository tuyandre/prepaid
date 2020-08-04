<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $table = 'checkouts';
    protected $fillable = [
        'client_id','cash','quantity','balance','total','date'
    ];

    public function Client()
    {
        return $this->belongsTo('App\Client','client_id');
    }
}

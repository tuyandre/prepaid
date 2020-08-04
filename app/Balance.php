<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $table = 'balances';
    protected $fillable = [
        'client_id','previous','balance','used','date'
    ];

    public function Client()
    {
        return $this->belongsTo('App\Client','client_id');
    }
}

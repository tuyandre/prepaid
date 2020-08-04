<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';
    protected $fillable = [
        'name','nid','telephone','compte','district','sector','cell','date'
    ];
    public function Balance()
    {
        return $this->hasMany('App\Balance');
    }
    public function Checkout()
    {
        return $this->hasMany('App\Checkout');
    }
}

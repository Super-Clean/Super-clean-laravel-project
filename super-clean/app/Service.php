<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'service_category', 'service_type', 'price',
        'no_of_hours', 'no_of_workers', 'address', 'description',
        'date', 'is_approve'
    ];

    public function user (){
        return $this->belongsTo('App\User'); // name of model
        // belongTo that mean from child to parents
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cities extends Model
{
    protected $fillable = [
        'id', 'city_name'
    ];
    
     public function perticularRecords($id)
    {
           $media = \App\cities::find($id);           
           return $media->city_name;
    }
    //
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function images(){
        return $this->belongsTo(Image::class,'gallerie_id','id');
    }

}

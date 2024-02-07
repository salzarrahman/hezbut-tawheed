<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookMangment extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function book_category(){
        return $this->belongsTo(BookCategory::class,'categorie_id','id');
    }
}

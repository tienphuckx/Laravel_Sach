<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_name','book_desc','book_category_id','book_img','book_slug','book_status'
    ];
    protected $table = 'books';

    public function category()
    {
        return $this->belongsTo('App\Models\Category','book_category_id','id');
    }

    public function chapter()
    {
        return $this->hasMany('App\Models\Chapter');
    }
}

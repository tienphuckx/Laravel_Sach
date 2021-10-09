<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','slug','desc','status'
    ];
    protected $table = 'categories';

    // RELATIONSHIP
    public function book()
    {
        return $this->hasMany('App\Models\Book');
    }
}

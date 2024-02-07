<?php

namespace App\Models;

use App\Models\CategoryModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookModel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'books';
    public function category(){
        return $this->belongsTo(CategoryModel::class);
    }
    public function borrowers()
    {
        return $this->hasMany(BorrowModel::class);
    }
}

<?php

namespace App\Models;

use App\Models\BorrowModel;
use App\Models\ReviewsModel;
use App\Models\CategoryModel;
use App\Models\CollectionModel;
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
    public function collectionbook(){
        return $this->hasMany(CollectionModel::class,'bookid', 'id');
    }
    public function comments(){
return $this->hasMany(ReviewsModel::class,'bookid', 'id');
    }
    public function borrowers()
    {
        return $this->hasMany(BorrowModel::class);
    }
}

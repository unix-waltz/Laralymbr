<?php

namespace App\Models;

use App\Models\BookModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryModel extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['category_name'];
    public function books(){
        return $this->hasMany(BookModel::class, 'category_id', 'id');
    }
}

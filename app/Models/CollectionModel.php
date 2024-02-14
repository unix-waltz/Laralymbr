<?php

namespace App\Models;

use App\Models\User;
use App\Models\BookModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CollectionModel extends Model
{
    use HasFactory;
    protected $table = 'collections';
    protected $guarded =['id'];
    public function usercollection(){
        return $this->belongsTo(User::class,'userid','id');
    }
    public function bookcollection(){
        return $this->belongsTo(BookModel::class,'bookid','id');
    }
}

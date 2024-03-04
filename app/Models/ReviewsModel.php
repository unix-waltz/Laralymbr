<?php

namespace App\Models;

use App\Models\User;
use App\Models\BookModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReviewsModel extends Model
{
    use HasFactory;
    protected $table ='reviews';
    protected $guarded = ['id'];

    public function books(){
        return $this->belongsTo(BookModel::class);
    }
    public function userComents(){
        return $this->belongsTo(User::class,'userid','id');
    }
}

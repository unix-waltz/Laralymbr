<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowingModel extends Model
{
    use HasFactory;
    protected $table = 'borrowing';
    protected $guarded = ['id'];
    public function user(){
        return $this->belongsTo(User::class,'userid','id');
    }
    public function book(){
        return $this->belongsTo(User::class,'bookid','id');
    }
}

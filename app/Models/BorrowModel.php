<?php

namespace App\Models;

use App\Models\User;
use App\Models\BookModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BorrowModel extends Model
{
    use HasFactory;
protected $table = 'borrows';
protected $guarded= ['id'];
    public function user()
{
    return $this->belongsTo(User::class);
}

public function book()
{
    return $this->belongsTo(BookModel::class);
}

}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\BorrowModel;
use App\Models\ReviewsModel;
use App\Models\CollectionModel;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'fullname',
        'address',
        'username',
        'role',
        'profilephoto',
    ];
    public function comments(){
        return $this->hasMany(ReviewsModel::class,'userid', 'id');
            }
    public function collectionuser(){
        return $this->hasMany(CollectionModel::class,'userid', 'id');
    }
    public function borrowedBooks()
    {
        return $this->hasMany(BorrowModel::class);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
 
}

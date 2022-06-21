<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Catagory extends Model
{
    // softDelete
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'catagory_name',
    ];

    // build 1 to 1 relation with categories table and user table 
    public function user(){
        return $this -> hasOne(user::class, 'id' , 'user_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'user_id'];


   /*  public function users_todo(){
        return $this->belongsTo(User::class, 'user_id');
    } */


}

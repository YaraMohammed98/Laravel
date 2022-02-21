<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model //model for database to create or delete or updtae it
{
    use HasFactory;
    protected $fillable= [

     'title',
     'description',
     'user_id',
     'created_at'
    ]; //array of columns which allowed to change

   public function user()   //relationship between post & user
   {
       return $this->belongsTo(User::class); //this >>object from post model ,belong to user model class
   }

}

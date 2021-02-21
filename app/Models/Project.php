<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // get the User that the Project belongs to
    public function user()
    {
      return $this->belongsTo(User::class);
      // note: even when you access User as a property instead of as a method, it will still call this method
      // and essentially is doing this query
      // select * from User where project_id= id of the current project
    }
}


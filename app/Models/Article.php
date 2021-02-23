<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function path()
    {
      return route('articles.show', $this);
    }

    // grab the author that the Article belongs to (saying author instead of User)
    public function author()
    {
      return $this->belongsTo(User::class, 'user_id'); // explicitly set the foreign key as 'user_id' as the second argument,
      // otherwise Laravel will assume the foreign key should be 'author_id' which is not a column in the articles table
    }

    public function tags()
    {
      return $this->belongsToMany(Tag::class)
    }


/* Example for fetching an article by its slug instead of its id (its primary key)
    
      // overwrite the getRouteKeyName function 
              public function getRouteKeyName()
            {
              return 'slug'; 
            }
      // this should return the name of the column that you want to query by
      // behind the scenes, Laravel is doing the following
      // Article::where('slug', $article)->first()
      // "Give me the article where the value in the column 'slug' matches the input from the wildcard {$article}
      // from routes/web.php Route::get('/articles/{article}' "
*/
}

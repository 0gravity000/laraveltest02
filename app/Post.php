<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Post extends Model
{
  public function comments()
  {
    return $this->hasMany(Comment::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function addComment($body)
  {
    $this->comments()->create(compact('body'));

//    Comment::create([
//      'body' => $body,
//      'post_id' => $this->id
//    ]);
  }
    //protected $guarded = [];
    //protected $fillable = ['title', 'body'];

    public function scopeFilter($query, $filters)
    {
            if($month = $filters['month']){
              $query->whereMonth('created_at', Carbon::parse($month)->month); //March => 3, May => 5
            }
            if($year = $filters['year']){
              $query->whereYear('created_at', $year);
            }

    }


}

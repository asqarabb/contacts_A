<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //
    protected $fillable=['text','time_visit','creator_post_id','destination_user_id','picture_name'];
    public function users()
    {
        $this->belongsToMany(User::class);
    } 
    public function contacts()
    {
        $this->belongsTo(contact::class);
    }
    
}

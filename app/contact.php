<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    //
    protected $fillable = [
        'name','family_name','email','phone_number','password','description',
    ];
    public function users()
    {
        $this->belongsTo(User::class);
    }
    public function posts()
    {
        $this->hasMany(post::class);
    }
}

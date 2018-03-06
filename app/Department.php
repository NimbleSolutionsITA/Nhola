<?php

namespace App;

use App;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function doctors()
    {
        return $this->belongsToMany(Doctor::class);
    }
    public function director()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function services()
    {
        return $this->hasMany(Service::class);
    }
    public function name()
    {
        $locale = App::getLocale();
        $name = 'name_'.$locale;
        return $this->$name;
    }
    public function excerpt()
    {
        $locale = App::getLocale();
        $excerpt = 'excerpt_'.$locale;
        return $this->$excerpt;
    }
    public function body()
    {
        $locale = App::getLocale();
        $body = 'body_'.$locale;
        return $this->$body;
    }
    public function thumb()
    {
        $thumb = preg_replace('/(\.gif|\.jpg|\.png)/', '-thumb$1', $this->image);
        return  $thumb;
    }
}

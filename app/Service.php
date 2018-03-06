<?php

namespace App;

use App;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function doctors()
    {
        return $this->belongsToMany(Doctor::class);
    }
    public function head()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function nurse()
    {
        return $this->belongsTo(Doctor::class);
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
}

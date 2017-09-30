<?php

namespace App;

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
    public function head()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function services()
    {
        return $this->hasMany(Service::class);
    }
}

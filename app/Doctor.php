<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public function departments()
    {
        return $this->belongsToMany(Department::class);
    }
    public function departments_director()
    {
        return $this->hasMany(Department::class, 'director_id');
    }
    public function departments_head()
    {
        return $this->hasMany(Department::class, 'head_id');
    }
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
    public function services_head()
    {
        return $this->hasMany(Service::class, 'head_id');
    }
}


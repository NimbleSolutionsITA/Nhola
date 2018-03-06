<?php

namespace App;

use App;
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
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
    public function services_head()
    {
        return $this->hasMany(Service::class, 'head_id');
    }
    public function services_nurse()
    {
        return $this->hasMany(Service::class, 'nurse_id');
    }
    public function activity()
    {
        $locale = App::getLocale();
        $activity = 'activity_'.$locale;
        return $this->$activity;
    }
    public function fullName()
    {
        $suffix = "";
        if ($this->gender == 'male' && $this->role == 'doctor') {
            $suffix = trans('app.dott');
        }
        if ($this->gender == 'female' && $this->role == 'doctor') {
            $suffix = trans('app.drssa');
        }
        if ($this->gender == 'male' && $this->role == 'nurse') {
            $suffix = trans('app.sig');
        }
        if ($this->gender == 'female' && $this->role == 'nurse') {
            $suffix = trans('app.sigra');
        }
        if ($this->gender == 'male' && $this->role == 'staff') {
            $suffix = trans('app.sig');
        }
        if ($this->gender == 'female' && $this->role == 'staff') {
            $suffix = trans('app.sigra');
        }
        $fullName = $suffix.$this->name.' '.$this->surname;
        return $fullName;
    }
    public function shortName()
    {
        $suffix = "";
        if ($this->gender == 'male' && $this->role == 'doctor') {
            $suffix = trans('app.dott');
        }
        if ($this->gender == 'female' && $this->role == 'doctor') {
            $suffix = trans('app.drssa');
        }
        if ($this->gender == 'male' && $this->role == 'nurse') {
            $suffix = trans('app.sig');
        }
        if ($this->gender == 'female' && $this->role == 'nurse') {
            $suffix = trans('app.sigra');
        }
        if ($this->gender == 'male' && $this->role == 'staff') {
            $suffix = trans('app.sig');
        }
        if ($this->gender == 'female' && $this->role == 'staff') {
            $suffix = trans('app.sigra');
        }
        $fullName = $suffix.$this->name[0].'. '.$this->surname;
        return $fullName;
    }

}


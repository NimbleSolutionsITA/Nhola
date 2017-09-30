<?php

namespace App;

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
}

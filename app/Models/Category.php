<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'status', 'image'];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    } 

    public function alert()
    {
        return $this->hasMany(Alert::class);
    }


}

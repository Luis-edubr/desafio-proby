<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['name', 'description', 'start_date', 'status'];
}

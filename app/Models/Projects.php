<?php

namespace App\Models;

use App\Models\Documents;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['name', 'description', 'start_date', 'status'];

    public function documents()
    {
        return $this->hasMany(Documents::class, 'project_id', 'id');
    }
}

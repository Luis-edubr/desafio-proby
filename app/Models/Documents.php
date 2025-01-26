<?php

namespace App\Models;

use App\Models\Projects;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    protected $table = 'documents';
    protected $primaryKey = 'id';
    protected $fillable = [ 'project_id', 'file_name', 'file_path'];

    public function project()
    {
        return $this->belongsTo(Projects::class, 'project_id', 'id');
    }
}

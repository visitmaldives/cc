<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    protected $fillable = ['name', 'guard_name', 'app_id'];

    public function app()
    {
        return $this->belongsTo(App::class);
    }
}

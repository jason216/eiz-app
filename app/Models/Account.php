<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends BaseModel
{
    // Soft delete and user authentication
    use SoftDeletes;

    // When querying the user, do not expose the password
    protected $hidden = ['deleted_at'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

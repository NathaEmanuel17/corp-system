<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlAccessControl extends Model
{
    
    protected $fillable = [
        'can_create',
        'can_read',
        'can_update',
        'can_delete',
        'role',
        'menu_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}

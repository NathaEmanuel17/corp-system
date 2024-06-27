<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'route_get',
        'route_post',
        'route_put',
        'route_delete'
    ];

    public function urlAccessControl()
    {
        return $this->hasMany(UrlAccessControl::class);
    }
}

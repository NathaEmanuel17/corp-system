<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'cpf',
        'phone',
        'uf',
        'city',
        'zip_code',
        'neighborhood',
        'number',
        'address',
        'complement',
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}

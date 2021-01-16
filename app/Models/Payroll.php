<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    protected $fillable = [
        'direccion', 'cuenta', 'banco', 'cantidad_bruto', 'telefono', 'user_id',
    ];
    protected $hidden = [
        'direccion', 'cuenta', 'cantidad_bruto',
    ];
}
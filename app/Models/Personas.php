<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Personas extends Model
{
    use HasFactory;
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario');
    }
    protected $fillable = [
        'id_usuario',
    ];
}

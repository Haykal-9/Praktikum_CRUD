<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fakultas extends Model
{
    use HasFactory;
    protected $table = 'fakultas';

    protected $primaryKey = 'id_fakultas';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'nama_fakultas',
        'kode_fakultas',
    ];

    public function prodis()
    {
        return $this->hasMany(Prodi::class);
    }
}

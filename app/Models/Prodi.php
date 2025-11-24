<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Prodi extends Model
{
    use HasFactory;

    protected $table = 'prodi';
    protected $primaryKey = 'id_prodi';
    public $incrementing = true;
    protected $fillable = [
        'nama_prodi',
        'kode_prodi',
        'fakultas_id'
    ];
    public $timestamps = true;

    /**
     * Get the mahasiswa for this prodi.
     */
    public function mahasiswa()
    {
        return $this->hasMany(\App\Models\Mahasiswa::class, 'id_prodi', 'id_prodi');
    }
    public function fakultas()
    {
        return $this->belongsTo(\App\Models\Fakultas::class, 'fakultas_id', 'id_fakultas');
    }

}

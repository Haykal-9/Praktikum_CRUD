<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'matakuliah';
    protected $primaryKey = 'id_mk';
    protected $fillable = [
        'id_mk',
        'nama_mk',
        'sks',
        'NIP'
    ];
    // id_mk is a non-incrementing string primary key
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The dosen that teaches this mata kuliah.
     */
    public function dosen()
    {
        return $this->belongsTo(\App\Models\Dosen::class, 'NIP', 'NIP');
    }

    /**
     * The nilai records for this mata kuliah.
     */
    public function nilai()
    {
        return $this->hasMany(\App\Models\Nilai::class, 'id_mk', 'id_mk');
    }
}

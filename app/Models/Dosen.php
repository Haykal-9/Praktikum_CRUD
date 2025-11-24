<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';
    protected $primaryKey = 'NIP';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'NIP',
        'nama',
        'email',
        'foto'
    ];

    /**
     * Get mata kuliah taught by this dosen.
     */
    public function mataKuliah()
    {
        return $this->hasMany(\App\Models\MataKuliah::class, 'NIP', 'NIP');
    }
}

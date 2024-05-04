<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;
    protected $table = 'tb_alternatif';
    protected $primaryKey = 'id';
    // public $alternatif = 'artikel';
    protected $fillable = [
        'nama_alternatif',
        'nis',
        'jurusan',
        'kelas'
    ];
    public function nilais()
    {
        return $this->hasMany(Nilai::class, 'id_alternatif');
    }
}

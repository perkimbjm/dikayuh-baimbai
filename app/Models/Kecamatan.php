<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Kecamatan extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'kecamatans';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'color',
        'geojson',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function kecamatanSecureds()
    {
        return $this->hasMany(Secured::class, 'kecamatan_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function dataKecamatan()
    {
        return DB::table('kecamatans')->get();
    }

    // // Kecamatan -> Kelurahan (One to Many)
    // public function kelurahans()
    // {
    //     return $this->hasMany(Kelurahan::class);
    // }

    // // Kecamatan -> Sarana (One to Many)
    // public function builds()
    // {
    //     return $this->hasOne(Build::class);
    // }
}

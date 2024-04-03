<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mapel_id',
        'kelas_id',
        'semester_id',
        'tahunajar_id',
        'siswa_id',
        'nilai',
        'jadwal_id',
    ];

    protected $guarded = ['id'];

    public static function createNilai($data)
    {
        return self::create($data);
    }

    protected $dates = [
        'created_at',
        'updated_at',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function tahunajar()
    {
        return $this->belongsTo(Tahunajar::class);
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
}

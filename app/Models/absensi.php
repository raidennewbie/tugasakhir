<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mapel_id',
        'kelas_id',
        'semester_id',
        'tahunajar_id',
        'siswa_id',
        'status',
        'jadwal_id',
    ];

    protected $guarded = ['id'];

    public static function createAbsensi($data)
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

    /**
     * Cari pengguna berdasarkan nama atau email.
     *
     * @param string $query
     * @return \Illuminate\Database\Eloquent\Collection
     */

    public static function search($query)
    {
        return self::where('status', 'LIKE', "%$query%")
            ->orWhereHas('kelas', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%$query%");
            })
            ->orWhereHas('siswa', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%$query%");
            })
            ->orWhereHas('semester', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%$query%");
            })
            ->orWhereHas('tahunajar', function ($q) use ($query) {
                $q->where('tahun_ajaran', 'LIKE', "%$query%");
            })
            ->orWhereHas('mapel', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%$query%");
            })
            ->orWhereHas('user', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%$query%");
            })
            ;
    }
}

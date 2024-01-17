<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function tahunajar()
    {
        return $this->belongsTo(Tahunajar::class);
    }

    public function absensi()
    {
        return $this->belongsTo(absensi::class);
    }


    /**
     * Cari pengguna berdasarkan nama atau email.
     *
     * @param string $query
     * @return \Illuminate\Database\Eloquent\Collection
     */
     

     public static function search($query)
{
    return self::where('hari', 'LIKE', "%$query%")
    ->orWhereHas('kelas', function ($q) use ($query) {
        $q->where('name', 'LIKE', "%$query%");
    })
    ->orWhereHas('user', function ($q) use ($query) {
        $q->where('name', 'LIKE', "%$query%");
    })
    ->orWhereHas('mapel', function ($q) use ($query) {
        $q->where('name', 'LIKE', "%$query%");
    });

}
}

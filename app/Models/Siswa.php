<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Siswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    // public function kelas()
    // {
    //     return $this->belongsTo(Kelas::class);
    // }

    public function kelas()
{
    return $this->belongsTo(Kelas::class); 
}

public function absensi()
{
    return $this->hasMany(Absensi::class, 'siswa_id');
}
 /**
     * Cari pengguna berdasarkan nama atau email.
     *
     * @param string $query
     * @return \Illuminate\Database\Eloquent\Collection
     */
     

     public static function search($query)
{
    return self::where('name', 'LIKE', "%$query%")
    ->orWhere('nisn', 'LIKE', "%$query%")
    ->orWhere('jenkel', 'LIKE', "%$query%")
               ->orWhereHas('kelas', function ($q) use ($query) {
                   $q->where('name', 'LIKE', "%$query%");
               });
}
}

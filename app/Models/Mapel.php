<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function jadwal()
    {
        return $this->hasMany(jadwal::class);
    }

     /**
     * Cari pengguna berdasarkan nama atau email.
     *
     * @param string $query
     * @return \Illuminate\Database\Eloquent\Collection
     */
     
     public static function search($query)
     {
         return self::where('name', 'LIKE', "%$query%");
     }
}

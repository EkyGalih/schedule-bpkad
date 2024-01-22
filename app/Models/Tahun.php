<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahun extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $table = 'tahun';
    protected $guarded = ['created_at', 'updated_at'];

    public function Jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Kegiatan extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $table = 'kegiatan';
    protected $guarded = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model){
            $model->id = (string)Uuid::generate((4));
        });
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }
}

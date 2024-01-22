<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Jadwal extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $table = 'schedule';
    protected $guarded = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model){
            $model->id = (string)Uuid::generate((4));
        });
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }

    public function tahun()
    {
        return $this->belongsTo(Tahun::class);
    }
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Webpatser\Uuid\Uuid;

class User extends Authenticatable
{
    use HasFactory;
    protected $table = 'users';
    public $incrementing = false;
    use Notifiable;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string)Uuid::generate(4);
        });
    }

    protected $guarded = ['created_at', 'updated_at'];
    protected $hidden = ['password', 'remember_token'];

    public function Bidang()
    {
        return $this->belongsTo(Bidang::class);
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }
}

<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class Setting extends Model
{
    public $timestamps = false;

    protected $table = 'settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'value',
    ];

    public function image()
    {
        return $this->belongsTo(Filemanager::class, 'value');
    }


    
}

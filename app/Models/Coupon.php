<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class Coupon extends Model
{
    protected $table = 'coupons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'offer_name',
        'offer_box',
        'offer_details',
        'store_id',
        'code',
        'tracking_link',
        'type',
        'is_enable',
        'created_at',
        'updated_at',
        'expiry',
        'alt',
        'image',
    ];



   
}

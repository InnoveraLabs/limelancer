<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($value)
    {
        if(is_null($value)){
            return $value = '/image/empty-image.png';
        } else {
            return asset('/storage/'.$value);
        }
    }

    public function getCreatedAtAttribute($date)
    {
        return $this->attributes['created_at'] = \Carbon\Carbon::parse($date)->toFormattedDateString();
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function hasPermission($permission):bool
    {
        return $this->role->permissions()->where('slug', $permission)->first() ? true:false;
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function languages()
    {
        return $this->hasMany(UserLanaguage::class);
    }

    public function skills()
    {
        return $this->hasMany(SkillUser::class);
    }

    public function educations()
    {
        return $this->hasMany(UserEducation::class);
    }

    public function providers()
    {
        return $this->hasMany(SocialAccount::class);
    }

    public function hasProvider($provider)
    {
        foreach ($this->providers as $p) {
            if ($p->provider == $provider) {
                return true;
            }
        }

        return false;
    }
}

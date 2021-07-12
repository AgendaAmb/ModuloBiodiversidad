<?php

namespace App;
use App\Rol;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'email', 'password',
    ];

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
    public function roles()
    {
        return $this->belongsToMany(Rol::class)->withTimestamps();
    }
    public function authorizeRoles($roles)
    {
        abort_unless($this->hasAnyRole($roles), 401);
        return true;
    }
    
    public function hasAnyRole($roles)
    {
        //dd(is_array($roles));
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)&&$role!="Ninguno") {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)&&$roles!="Ninguno") {
                 return true; 
            }   
        }
        return false;
    }
    public function hasARole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)&&$role!="Ninguno") {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)&&$roles!="Ninguno") {
                 return true; 
            }   
        }
        return false;
    }
    
    public function hasRole($role)
    {
        if ($this->roles()->where('nombre', $role)->first()) {
            return true;
        }
        return false;
    }
    public function hasRoleid($roleid)
    {
      
        if ($this->roles()->where('rol_id', $roleid)->first()) {
            return true;
        }
        return false;
    }
    
    public function Plantas()
    {
        return $this->hasMany(Planta::class);
    }
    public function FichasT()
    {
        return $this->hasMany(FichaTecnica::class);
    }
    
}

<?php
namespace App;

use App\Models\AdsImage;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Hash;

/**
 * Class User
 *
 * @package App
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
*/
class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $fillable = ['firstname','lastname', 'email', 'phone', 'password', 'remember_token', 'status'];

    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }

    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function advertise_image()
    {
        return $this->hasMany(AdsImage::class, 'user_id');
    }

    public function social_connectors()
    {
        return $this->hasMany(SocialConnector::class, 'user_id');
    }

    public function social_schema()
    {
        return $this->hasMany(SocialSchema::class, 'user_id');
    }
}

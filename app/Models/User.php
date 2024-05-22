<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;
use Ramsey\Uuid\Uuid;

class User extends AuthenticatableUser implements CanResetPasswordContract
{
    use SoftDeletes, Notifiable,CanResetPassword;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'users';
    protected $guard = [];
    public $timestamps = true;

    protected $hidden = [
        // 'password',
        'remember_token',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function (Model $model) {
            $model->setAttribute($model->getKeyName(), Uuid::uuid4());
        });
    }
}

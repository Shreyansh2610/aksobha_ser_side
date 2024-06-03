<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Ramsey\Uuid\Uuid;

class Workshop extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'workshops';
    public $guarded = [];
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

    /**
     * Get all of the payment for the Workshop
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payment()
    {
        return $this->hasMany(UserPayment::class);
    }

    /**
     * Get all of the payment for the Workshop
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function resources()
    {
        return $this->hasMany(Resource::class);
    }

    /**
     * Get all of the payment for the Workshop
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function days()
    {
        return $this->hasMany(Day::class);
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }


}

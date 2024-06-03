<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Ramsey\Uuid\Uuid;

class Faq extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'faqs';
    public $guarded = [];
    public $timestamps = true;

    protected static function boot()
    {
        parent::boot();
        static::creating(function (Model $model) {
            $model->setAttribute($model->getKeyName(), Uuid::uuid4());
        });
    }

    /**
     * Get the workshop that owns the Faq
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }

    /**
     * Get the user associated with the Faq
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function days()
    {
        return $this->hasOne(Day::class, 'workshop_id', 'workshop_id')->where('day',$this->day);
    }
}

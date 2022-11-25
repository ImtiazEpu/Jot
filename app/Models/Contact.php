<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    protected $guarded = [];

    protected $dates = ['birthday'];

    public function path()
    {
        return url('/contacts/' . $this->id);
    }

    /**
     * @param $birthday
     */
    public function setBirthdayAttribute($birthday)
    {
        $this->attributes['birthday'] = Carbon::parse($birthday);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}

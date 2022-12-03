<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Contact extends Model
{
    use Searchable;
    protected $guarded = [];

    protected $dates = ['birthday'];

    public function path(): string {
        return '/contacts/' . $this->id;
    }

    public function scopeBirthdays( $query ) {
        return $query->whereRaw('birthday like "%-'.now()->format('m').'-%"');
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

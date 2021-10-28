<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Quota extends Model
{
    public function payments() : HasMany {
        return $this->hasMany(QuotaPayment::class);
    }

    public function members(): MorphToMany {
        return $this->morphToMany(Member::class, 'QuotaPayment');
    }
}

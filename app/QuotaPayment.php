<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuotaPayment extends Model
{
    public function member() : BelongsTo {
        return $this->belongsTo(Member::class);
    }

    public function quota() : BelongsTo {
        return $this->belongsTo(Quota::class);
    }

}

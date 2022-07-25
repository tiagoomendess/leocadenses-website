<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Member extends Model
{
    public function document_type() : BelongsTo {
        return $this->belongsTo(DocumentType::class);
    }

    public function quotas(): BelongsToMany {
        return $this->belongsToMany(Quota::class, 'quota_payments', 'member_id', 'quota_id');
    }

    public function quota_payments() : HasMany {
        return $this->hasMany(QuotaPayment::class);
    }

    public function isValid() {
        return !empty($this->document)
            && strlen($this->document) > 4
            && ($this->document != 'nada' || $this->document != 'Nada');
    }

    public function hasAllQuotasPaid() : bool
    {
        $now = new \DateTime();

        $allAvailable = Quota::where('due_date', '>', $this->created_at)
            ->where('due_date', '<', $now->format('Y-m-d'))
            ->get();

        $paid = $this->quotas;

        if (count($paid) == 0)
            return false;

        foreach ($allAvailable as $available) {
            if (!$paid->contains($available)) {
                return false;
            }
        }

        return true;
    }
}

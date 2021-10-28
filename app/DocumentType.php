<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DocumentType extends Model
{
    public function members() : HasMany {
        return $this->hasMany(Member::class);
    }
}

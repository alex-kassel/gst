<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stakeholder extends Model
{
    use HasFactory;

    public function urls(): HasMany
    {
        return $this->hasMany(StakeholderUrl::class);
    }
}

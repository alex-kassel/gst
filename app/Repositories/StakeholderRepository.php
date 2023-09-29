<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Stakeholder;

class StakeholderRepository extends BasicRepository
{
    public function __construct(Stakeholder $stakeholder)
    {
        parent::__construct($stakeholder);
    }
}

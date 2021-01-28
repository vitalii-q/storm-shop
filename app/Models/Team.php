<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use Translatable;

    protected $table = 'team';
}

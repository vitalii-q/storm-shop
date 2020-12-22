<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainSlider extends Model
{
    protected $table = 'main_slider';

    protected $fillable = ['text', 'text_en', 'text_top', 'text_top_en', 'text_bottom', 'text_bottom_en', 'text_position', 'image', 'button', 'link'];
}

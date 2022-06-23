<?php

namespace App\Contracts\Video;

interface VideoHosting
{
    public function getVideoWidth();

    public function getVideoHeight();

    public function showString();
}

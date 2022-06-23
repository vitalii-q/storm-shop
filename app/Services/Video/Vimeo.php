<?php

namespace App\Services\Video;

use App\Contracts\Video\VideoHosting;

class Vimeo implements VideoHosting
{
    protected $random;

    public function __construct()
    {
        $this->random = 'Vimeo'.rand(0, 10000);
    }

    public function showRandomString()
    {
        return $this->random;
    }

    public function getVideoWidth()
    {
        // TODO: Implement getVideoWidth() method.
    }

    public function getVideoHeight()
    {
        // TODO: Implement getVideoHeight() method.
    }

    public function showString()
    {
        return $this->showRandomString();
    }
}

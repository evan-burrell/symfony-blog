<?php

namespace App\Factory;

use Cocur\Slugify\Slugify;

class SlugFactory
{
    public function create()
    {
        return new Slugify();
    }
}

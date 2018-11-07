<?php

namespace App\Factory;

use App\Entity\Post;

class PostFactory
{
    public function create()
    {
        return new Post();
    }
}

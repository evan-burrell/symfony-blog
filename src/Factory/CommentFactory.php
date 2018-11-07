<?php

namespace App\Factory;

use App\Entity\Comment;

class CommentFactory
{
    public function create()
    {
        return new Comment();
    }
}

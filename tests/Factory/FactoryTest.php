<?php

use PHPUnit\Framework\TestCase;
use App\Factory\UserFactory;
use App\Factory\CommentFactory;
use App\Factory\PostFactory;
use App\Factory\SlugFactory;

class FactoryTest extends TestCase
{
    public function testUserFactoryReturnsUser()
    {
        $userFactory = new UserFactory();
        $this->assertInstanceOf(UserFactory::class, $userFactory);
    }

    public function testCommentFactoryReturnsComment()
    {
        $commentFactory = new CommentFactory();
        $this->assertInstanceOf(CommentFactory::class, $commentFactory);
    }

    public function testPostFactoryReturnsPost()
    {
        $postFactory = new PostFactory();
        $this->assertInstanceOf(PostFactory::class, $postFactory);
    }

    public function testSlugFactoryReturnsSlug()
    {
        $slugFactory = new SlugFactory();
        $this->assertInstanceOf(SlugFactory::class, $slugFactory);
    }
}

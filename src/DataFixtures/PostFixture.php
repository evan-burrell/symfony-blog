<?php

namespace App\DataFixtures;

use App\Entity\Post;
use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;


class PostFixture extends BaseFixture
{
    public function loadData(ObjectManager $manager)
    {
        $this->createMany(Post::class, 10, function(Post $post) {
            $post->setUserId(null)
                ->setTitle($this->faker->sentence())
                ->setBody($this->faker->paragraph());
        });

        $manager->flush();
    }
}

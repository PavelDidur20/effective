<?php
namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
    
        $anna = (new User())->setName('Анна')->setEmail('anna@example.com');
        $manager->persist($anna);

        $ivan = (new User())->setName('Иван')->setEmail('ivan@example.com');
        $manager->persist($ivan);

  
        for ($i = 1; $i <= 3; $i++) {
            $post = (new Post())
                ->setUser($anna)
                ->setContent("Пост №{$i} Анны");
            $manager->persist($post);
        }

        $manager->flush();
    }
}

<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ProjectFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('en_US');

        $projectName = [
            'DevFolio OS', 'API Gateway', 'Auth Service',
            'Task Manager', 'Blog Engine', 'E-commerce API',
            'Chat App', 'Analytics Dashboard', 'CMS Core', 'Job Board',
        ];
        foreach ($projectName as $name) {
            $project = new Project();
            $project->setName($name);
            $project->setDescription($faker->paragraph(3));
            $project->setGithubUrl(
                'https://github.com/minhquan-Hoang95/'.$faker->slug(3)
            );
            $project->setLanguage(
                $faker->randomElement(['PHP', 'JavaScript', 'Python', 'Java', 'C#', 'Ruby', 'Go', 'Rust'])
            );
            $project->setCreatedAt(
                new \DateTimeImmutable($faker->dateTimeBetween('-3 year', 'now')->format('Y-m-d'))
            );

            $manager->persist($project);
        }

        $manager->flush();
    }
}

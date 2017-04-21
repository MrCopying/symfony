<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Author;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadAuthorData implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * Sets the container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        //echo '  Kernel directory: ' . $this->container->getParameter('kernel.root_dir');
        $jsonFile = $this->container->getParameter('kernel.root_dir') . '/../var/data/author.json';
        $json = json_decode(file_get_contents($jsonFile));

        foreach ( $json as $value) {
            //var_dump($value->death_date);

            $deathDate = $value->death_date ? \DateTime::createFromFormat('d/m/Y',$value->death_date) : NULL;
            //var_dump($deathDate);
            $author = (new Author())
                ->setFirstName($value->first_name)
                ->setLastName($value->last_name)
                ->setGender($value->gender ? 'M' : 'F')
                ->setBirthDate(\DateTime::createFromFormat('d/m/Y',$value->birth_date))
                ->setDeathDate($deathDate);
            $manager->persist($author);
            //var_dump($author);
        }
        $manager->flush();
//        $userAdmin = new User();
//        $userAdmin->setUsername('admin');
//        $userAdmin->setPassword('test');
//
//        $manager->persist($userAdmin);
//        $manager->flush();
    }
}

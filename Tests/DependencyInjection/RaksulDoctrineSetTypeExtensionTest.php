<?php

namespace Raksul\DoctrineSetTypeBundle\Tests\DependencyInjection;

use Raksul\DoctrineSetTypeBundle\DependencyInjection\RaksulDoctrineSetTypeExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class RaksulDoctrineSetTypeExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testDefault()
    {
        $container = new ContainerBuilder();
        $loader = new RaksulDoctrineSetTypeExtension();
        $loader->load(array(array()), $container);
        $this->assertTrue($container->hasDefinition('doctrine_set_type.set_type_guesser'), 'SetTypeGuesser is loaded');
        $this->assertEquals('Raksul\DoctrineSetTypeBundle\DBAL\Types\AbstractSetType', $container->getParameter('doctrine_set_type.set_type.class_name'));
        $this->assertEquals('Raksul\DoctrineSetTypeBundle\Form\Guess\SetTypeGuesser', $container->getParameter('doctrine_set_type.set_type_guesser.class'));
    }
}

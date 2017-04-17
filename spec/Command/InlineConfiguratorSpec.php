<?php
/**
 * This file is part of the phpspec-console package.
 * (c) 2017 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace spec\Tidal\PhpSpec\ConsoleExtension\Command;

use Tidal\PhpSpec\ConsoleExtension\Command\InlineConfigurator;
use Tidal\PhpSpec\ConsoleExtension\Contract\Command\InlineConfigCommandInterface;
use spec\Tidal\PhpSpec\ConsoleExtension\Behavior\Command\IsConfiguratorSpecTrait;
use PhpSpec\ObjectBehavior;
use Prophecy\Prophet;
use Prophecy\Prophecy\ObjectProphecy;

/**
* class spec\Tidal\PhpSpec\ConsoleExtension\Command\InlineConfiguratorSpec
*/
class InlineConfiguratorSpec extends ObjectBehavior
{
    use IsConfiguratorSpecTrait;

    function it_is_initializable()
    {
        $this->shouldHaveType(InlineConfigurator::class);
    }

    /**
     * override prophecy creation
     *
     * @return ObjectProphecy
     */
    private function createCommandProphecy()
    {
        $prophet = new Prophet;
        $prophecy = $prophet->prophesize()->willImplement(InlineConfigCommandInterface::class);
        $prophecy
            ->setName('foo')
            ->shouldBeCalled();
        $prophecy
            ->getConfig()
            ->willReturn(['name'=>'foo']);

        return $prophecy;
    }
}


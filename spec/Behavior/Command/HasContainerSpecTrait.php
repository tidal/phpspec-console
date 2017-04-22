<?php
/**
 * This file is part of the phpspec-console package.
 * (c) 2017 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Tidal\PhpSpec\ConsoleExtension\Behavior\Command;

use spec\Tidal\PhpSpec\ConsoleExtension\Behavior\Prophecy\HasContainerMockTrait;
use PhpSpec\ServiceContainer;
use Prophecy\Prophecy\MethodProphecy;

/**
 * Trait spec\Tidal\PhpSpec\ConsoleExtension\Behavior\Command\HasContainerSpecTrait
 *
 * @method MethodProphecy|object setContainer(ServiceContainer $container)
 * @method MethodProphecy|object getContainer()
 */
trait HasContainerSpecTrait
{
    use HasContainerMockTrait;

    function its_container_is_accessible()
    {
        $container = $this->createContainerMock();

        $this->setContainer($container);
        $this->getContainer()->shouldReturn($container);
    }

}

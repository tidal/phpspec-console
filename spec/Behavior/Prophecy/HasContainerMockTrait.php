<?php
/**
 * This file is part of the phpspec-console package.
 * (c) 2017 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Tidal\PhpSpec\ConsoleExtension\Behavior\Prophecy;

use PhpSpec\ServiceContainer;
use Prophecy\Prophet;
use Prophecy\Prophecy\ObjectProphecy;


/**
 * Trait spec\Tidal\PhpSpec\ConsoleExtension\Behavior\Prophecy\HasContainerMockTrait
 */
trait HasContainerMockTrait
{
    /**
     * @return ObjectProphecy
     */
    private function createContainerProphecy()
    {
        return (new Prophet)
            ->prophesize()
            ->willImplement(
                ServiceContainer::class
            );
    }

    /**
     * @return object|ServiceContainer
     */
    private function createContainerMock()
    {
        return $this->createContainerProphecy()->reveal();
    }
}


<?php
/**
 * This file is part of the phpspec-console package.
 * (c) 2017 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Tidal\PhpSpec\ConsoleExtension\Behavior\Prophecy;

use Prophecy\Prophet;
use Prophecy\Prophecy\ObjectProphecy;
use Symfony\Component\Console\Input\InputInterface;

/**
 * Trait spec\Tidal\PhpSpec\ConsoleExtension\Behavior\Prophecy\HasInputMockTrait
 */
trait HasInputMockTrait
{
    /**
     * @return ObjectProphecy
     */
    private function createInputProphecy()
    {
        return (new Prophet)
            ->prophesize()
            ->willImplement(InputInterface::class);
    }

    /**
     * @return object|InputInterface
     */
    private function createInputMock()
    {
        return $this->createInputProphecy()->reveal();
    }
}


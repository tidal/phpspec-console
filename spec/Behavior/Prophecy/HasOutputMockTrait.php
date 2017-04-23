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
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Trait spec\Tidal\PhpSpec\ConsoleExtension\Behavior\Prophecy\HasOutputMockTrait
 */
trait HasOutputMockTrait
{
    /**
     * @return ObjectProphecy
     */
    private function createOutputProphecy()
    {
        return (new Prophet)
            ->prophesize()
            ->willImplement(OutputInterface::class);
    }

    /**
     * @return object|OutputInterface
     */
    private function createOutputMock()
    {
        return $this->createOutputProphecy()->reveal();
    }
}


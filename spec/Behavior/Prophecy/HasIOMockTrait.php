<?php
/**
 * This file is part of the phpspec-console package.
 * (c) 2017 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace spec\Tidal\PhpSpec\ConsoleExtension\Behavior\Prophecy;

use PhpSpec\Console\ConsoleIO;
use Prophecy\Prophet;
use Prophecy\Prophecy\ObjectProphecy;

/**
 * trait spec\Tidal\PhpSpec\ConsoleExtension\Behavior\Prophecy\HasIOMockTrait
 */
trait HasIOMockTrait
{
    /**
     * @return ObjectProphecy
     */
    private function createIOProphecy()
    {
        $prophet = new Prophet;
        return $prophet->prophesize()->willExtend(ConsoleIO::class);
    }

    /**
     * @return object|ConsoleIO
     */
    private function createIOMock()
    {
        return $this->createIOProphecy()->reveal();
    }
}


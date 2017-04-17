<?php
/**
 * This file is part of the phpspec-console package.
 * (c) 2017 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Tidal\PhpSpec\ConsoleExtension\Behavior\Prophecy;


use Tidal\PhpSpec\ConsoleExtension\Writer;
use PhpSpec\Console\ConsoleIO;
use Prophecy\Prophet;
use Prophecy\Prophecy\ObjectProphecy;

/**
 * trait spec\Tidal\PhpSpec\ConsoleExtension\Behavior\Prophecy\HasWriterMockTrait
 */
trait HasWriterMockTrait
{
    /**
     * @return ObjectProphecy
     */
    private function createWriterProphecy()
    {
        $prophet = new Prophet;
        return $prophet->prophesize()->willExtend(Writer::class);
    }

    /**
     * @return object|ConsoleIO
     */
    private function createWriterMock()
    {
        return $this->createWriterProphecy()->reveal();
    }
}


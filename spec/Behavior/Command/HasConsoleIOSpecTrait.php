<?php
/**
 * This file is part of the phpspec-console package.
 * (c) 2017 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Tidal\PhpSpec\ConsoleExtension\Behavior\Command;

use spec\Tidal\PhpSpec\ConsoleExtension\Behavior\Prophecy\HasIOMockTrait;

/**
 * trait spec\Tidal\PhpSpec\ConsoleExtension\Behavior\Command\HasConsoleIOTraitSpec
 */
trait HasConsoleIOSpecTrait
{
    use HasIOMockTrait;

    function its_io_is_accessible()
    {
        $io = $this->createIOMock();

        $this->setConsoleIO($io);
        $this->getConsoleIO()->shouldReturn($io);
    }
}


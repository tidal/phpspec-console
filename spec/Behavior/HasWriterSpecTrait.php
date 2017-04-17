<?php

/**
 * This file is part of the phpspec-console package.
 * (c) 2017 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Tidal\PhpSpec\ConsoleExtension\Behavior;

use spec\Tidal\PhpSpec\ConsoleExtension\Behavior\Prophecy\HasWriterMockTrait;

trait HasWriterSpecTrait
{
    use HasWriterMockTrait;

    function its_writer_is_accessible()
    {
        $writer = $this->createWriterMock();

        $this->setWriter($writer);
        $this->getWriter()->shouldReturn($writer);
    }
}


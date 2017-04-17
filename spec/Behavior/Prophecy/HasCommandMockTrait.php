<?php
/**
 * This file is part of the DEPH package.
 * (c) 2017 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Tidal\PhpSpec\ConsoleExtension\Behavior\Prophecy;

use Tidal\PhpSpec\ConsoleExtension\Command\GenericCommand;
use Prophecy\Prophet;
use Prophecy\Prophecy\ObjectProphecy;

trait HasCommandMockTrait
{
    /**
     * @return ObjectProphecy
     */
    private function createCommandProphecy()
    {
        $prophet = new Prophet;
        return $prophet->prophesize()->willExtend(GenericCommand::class);
    }

    /**
     * @return object|GenericCommand
     */
    private function createCommandMock()
    {
        return $this->createCommandProphecy()->reveal();
    }
}

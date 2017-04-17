<?php
/**
 * This file is part of the phpspec-console package.
 * (c) 2017 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Tidal\PhpSpec\ConsoleExtension\Behavior\Prophecy;

use Tidal\PhpSpec\ConsoleExtension\Command\Configurator;
use Prophecy\Prophet;
use Prophecy\Prophecy\ObjectProphecy;

trait HasConfiguratorMockTrait
{
    /**
     * @return ObjectProphecy
     */
    private function createConfiguratorProphecy()
    {
        $prophet = new Prophet;
        return $prophet->prophesize()->willExtend(Configurator::class);
    }

    /**
     * @return object|Configurator
     */
    private function createConfiguratorMock()
    {
        return $this->createConfiguratorProphecy()->reveal();
    }
}


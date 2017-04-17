<?php
/**
 * This file is part of the phpspec-console package.
 * (c) 2017 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Tidal\PhpSpec\ConsoleExtension\Behavior\Command;

use Tidal\PhpSpec\ConsoleExtension\Contract\Command\ConfiguratorInterface;

trait IsConfiguratorSpecTrait
{
    function it_is_configurator()
    {
        $this->shouldImplement(ConfiguratorInterface::class);
    }

    function its_config_is_accessible()
    {
        $config = ['foo' => 'bar'];

        $this->setConfig($config);
        $this->getConfig()->shouldReturn($config);
    }
}

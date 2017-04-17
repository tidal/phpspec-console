<?php
/**
 * This file is part of the phpspec-console package.
 * (c) 2017 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tidal\PhpSpec\ConsoleExtension\Command;

use Tidal\PhpSpec\ConsoleExtension\Behavior\Command\ConfiguratorTrait;
use Tidal\PhpSpec\ConsoleExtension\Contract\Command\{
    CommandInterface,
    InlineConfigCommandInterface,
    ConfiguratorInterface
};
use RuntimeException;

/**
 * class Tidal\PhpSpec\ConsoleExtension\\Configurator
 */
class Configurator implements ConfiguratorInterface
{
    use ConfiguratorTrait;

    /**
     * @param CommandInterface $command
     * @return bool
     */
    protected function doAccept(CommandInterface $command): bool
    {
        return $command instanceof CommandInterface;
    }

    /**
     * @param InlineConfigCommandInterface $command
     */
    protected function doConfigure(InlineConfigCommandInterface $command)
    {
       if (!isset($this->config)) {
            throw new RuntimeException(sprintf(
                'Config has not been set in &s',
                __METHOD__
            ));
       }
    }
}


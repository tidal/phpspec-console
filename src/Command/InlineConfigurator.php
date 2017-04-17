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
    CommandInterface, InlineConfigCommandInterface, ConfiguratorInterface
};

/**
 * class Tidal\PhpSpec\ConsoleExtension\Command\InlineConfigurator
 */
class InlineConfigurator implements ConfiguratorInterface
{
    use ConfiguratorTrait;

     /**
     * @param CommandInterface $command
     * @return bool
     */
    protected function doAccept(CommandInterface $command): bool
    {
        return $command instanceof InlineConfigCommandInterface;
    }

    /**
     * @param InlineConfigCommandInterface $command
     */
    protected function doConfigure(InlineConfigCommandInterface $command)
    {
        $this->setConfig(
            $command->getConfig()
        );
    }
}


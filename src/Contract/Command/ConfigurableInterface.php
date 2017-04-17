<?php
/**
 * This file is part of the phpspec-console package.
 * (c) 2017 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tidal\PhpSpec\ConsoleExtension\Contract\Command;

/**
 * interface Tidal\PhpSpec\ConsoleExtension\Contract\Command\ConfigurableInterface
 */
interface ConfigurableInterface
{
    /**
     * @param ConfiguratorInterface $configurator
     */
    public function setConfigurator(ConfiguratorInterface $configurator);

    /**
     * @return ConfiguratorInterface
     */
    public function getConfigurator(): ConfiguratorInterface;
}


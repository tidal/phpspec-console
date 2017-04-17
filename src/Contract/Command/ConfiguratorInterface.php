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
 * interface Tidal\PhpSpec\ConsoleExtension\Contract\Command\ConfiguratorInterface
 */
interface ConfiguratorInterface
{
    /**
     * @param CommandInterface $command
     * @return mixed
     */
    public function configure(CommandInterface $command) : void;

    /**
     * @param CommandInterface $command
     * @return bool
     */
    public function accept(CommandInterface $command) : bool ;

    /**
     * @param array $config
     */
    public function setConfig(array $config) : void;

    /**
     * @return array
     */
    public function getConfig(): array;
}


<?php
/**
 * This file is part of the phpspec-console package.
 * (c) 2017 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tidal\PhpSpec\ConsoleExtension\Behavior\Command;

use Tidal\PhpSpec\ConsoleExtension\Contract\Command\ConfiguratorInterface;

trait ConfigurableTrait
{
    /**
     * @var ConfiguratorInterface
     */
    private $configurator;

    /**
     * @param ConfiguratorInterface $configurator
     */
    public function setConfigurator(ConfiguratorInterface $configurator)
    {
        $this->configurator = $configurator;
    }

    /**
     * @return ConfiguratorInterface
     */
    public function getConfigurator(): ConfiguratorInterface
    {
        return $this->configurator;
    }
}


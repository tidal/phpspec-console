<?php
/**
 * This file is part of the phpspec-console package.
 * (c) 2017 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tidal\PhpSpec\ConsoleExtension\Command;

use Symfony\Component\Console\Command\Command;
use Tidal\PhpSpec\ConsoleExtension\Contract\Command\{
    ConfiguratorInterface,
    CommandInterface
};
use Tidal\PhpSpec\ConsoleExtension\Contract\WriterInterface;
use Tidal\PhpSpec\ConsoleExtension\Behavior\Command\{
    ConfigurableTrait,
    HasInputTrait
};
use Tidal\PhpSpec\ConsoleExtension\Behavior\{
    HasWriterTrait,
    HasContainerTrait
};
use Tidal\PhpSpec\ConsoleExtension\Contract\Command\ConfigInterface as Config;

/**
 * class Tidal\PhpSpec\ConsoleExtension\Command\GenericCommand
 */
class GenericCommand extends Command implements CommandInterface
{
    use ConfigurableTrait,
        HasInputTrait,
        HasWriterTrait,
        HasContainerTrait;

    /**
     * GenericCommand constructor.
     * @param WriterInterface $writer
     * @param ConfiguratorInterface $configurator
     * @param array|null $config
     */
    public function __construct(WriterInterface $writer, ConfiguratorInterface $configurator, ?array $config = [])
    {
        if ($config !== null) {
            $configurator->setConfig($config);
            if (isset($config[Config::NAME_KEY])) {
                $this->setName($config[Config::NAME_KEY]);
            }
        }
        $this->setWriter($writer);
        $this->setConfigurator($configurator);
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->getConfigurator()
            ->configure($this);
    }

    /**
     * @param string[] $usages
     */
    public function setUsages(array $usages = [])
    {
        foreach ($usages as $usage) {
            $this->addUsage($usage);
        }
    }
}


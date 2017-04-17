<?php
/**
 * This file is part of the phpspec-console package.
 * (c) 2017 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tidal\PhpSpec\ConsoleExtension\Behavior\Command;

use Tidal\PhpSpec\ConsoleExtension\Exception\InvalidCommandException;
use Tidal\PhpSpec\ConsoleExtension\Contract\Command\CommandInterface;
use Tidal\PhpSpec\ConsoleExtension\Contract\Command\ConfigInterface as Config;
use Symfony\Component\Console\Input\InputArgument;

/**
 * trait Tidal\PhpSpec\ConsoleExtension\Behavior\Command\ConfiguratorTrait
 */
trait ConfiguratorTrait
{
    /**
     * @var array
     */
    private $config;

    /**
     * @param array $config
     */
    public function setConfig(array $config) : void
    {
        $this->config = $config;
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * @param CommandInterface $command
     */
    public function configure(CommandInterface $command) : void
    {
        if (!$this->accept($command)) {
            throw new InvalidCommandException($command);
        }

        $this->doConfigure($command);
        $this->configureScalarProperties($command);
        $this->configureArguments($command);
        $this->configureOptions($command);
    }

    abstract protected function doConfigure(CommandInterface $command);

    public function accept(CommandInterface $command): bool
    {
        return $this->doAccept($command);
    }

    abstract protected function doAccept(CommandInterface $command): bool;

    /**
     * @param array $config
     * @return InputArgument[]
     */
    protected function createArguments(array $config)
    {
        $arguments = [];
        foreach ($config as $name => $argument) {
            $arguments[] = new InputArgument(
                $name,
                $argument[Config::MODE_KEY],
                $argument[Config::DESCRIPTION_KEY]
            );
        }

        return $arguments;
    }

    /**
     * @param CommandInterface $command
     */
    private function configureArguments(CommandInterface $command)
    {
        $command->setDefinition(
            $this->createArguments(
                $this->getConfig()[Config::ARGUMENTS_KEY]
            )
        );
    }

    /**
     * @param CommandInterface $command
     */
    private function configureOptions(CommandInterface $command)
    {
        foreach ($this->getConfig()[Config::OPTIONS_KEY] as $name => $option) {
            $command->addOption(
                $name,
                null,
                $option[Config::MODE_KEY],
                $option[Config::DESCRIPTION_KEY]
            );
        }
    }

    private function getScalarConfig()
    {
        return array_intersect_key(
            $this->getConfig(),
            array_flip(
                Config::SCALAR_CONFIG
            )
        );
    }

    private function configureScalarProperties(CommandInterface $command)
    {
        foreach ($this->getScalarConfig() as $key => $value) {
            $command->{'set'.ucfirst($key)}($value);
        }
    }
}


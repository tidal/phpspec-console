<?php
/**
 * This file is part of the phpspec-console package.
 * (c) 2017 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Tidal\PhpSpec\ConsoleExtension\Behavior\Command;

use spec\Tidal\PhpSpec\ConsoleExtension\Behavior\Prophecy\HasCommandMockTrait;
use Tidal\PhpSpec\ConsoleExtension\Contract\Command\ConfiguratorInterface;
use Tidal\PhpSpec\ConsoleExtension\Contract\Command\ConfigInterface as Config;
use Prophecy\Argument;

trait IsConfiguratorSpecTrait
{
    use HasCommandMockTrait;

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

    function it_configures_name()
    {
        try {
            $command = $this->createCommandProphecy();
            $value = 'foo';

            $this->setConfig([
                Config::NAME_KEY => $value
            ]);

            $command->setName($value)
                ->shouldBeCalled();

            $this->configure($command->reveal());
        }catch (\Throwable $throwable) {
            echo "\n\n".$throwable->getMessage()."\n\n".$throwable->getTraceAsString()."\n\n";
        }
    }

    function it_configures_description()
    {
        $command = $this->createCommandProphecy();
        $value = 'foo';

        $this->setConfig([
            Config::DESCRIPTION_KEY => $value
        ]);

        $command->setDescription($value)
            ->shouldBeCalled();

        $this->configure($command);
    }

    function it_configures_help()
    {
        $command = $this->createCommandProphecy();
        $value = 'foo';

        $this->setConfig([
            Config::HELP_KEY => $value
        ]);

        $command->setHelp($value)
            ->shouldBeCalled();

        $this->configure($command);
    }

    function it_configures_hidden()
    {
        $command = $this->createCommandProphecy();
        $value = true;

        $this->setConfig([
            Config::HIDDEN_KEY => $value
        ]);

        $command->setHidden($value)
            ->shouldBeCalled();

        $this->configure($command);
    }

    function it_configures_arguments()
    {
        $command = $this->createCommandProphecy();
        $name = 'foo';

        $this->setConfig([
            Config::ARGUMENTS_KEY => [
                $name => [
                    Config::NAME_KEY => $name,
                    Config::MODE_KEY => 1,
                    Config::DESCRIPTION_KEY => 'bar baz bus'
                ],
            ]
        ]);

        $command->setDefinition(Argument::type('array'))
            ->shouldBeCalled();

        $this->configure($command);
    }

    function it_configures_options()
    {
        $command = $this->createCommandProphecy();
        $name = 'foo';

        $this->setConfig([
            Config::OPTIONS_KEY => [
                $name => [
                    Config::NAME_KEY => $name,
                    Config::MODE_KEY => 1,
                    Config::DESCRIPTION_KEY => ''
                ],
            ]
        ]);

        $command->addOption($name, null, 1, '')
            ->shouldBeCalled();

        $this->configure($command);
    }
}

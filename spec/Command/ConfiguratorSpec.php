<?php
/**
 * This file is part of the phpspec-console package.
 * (c) 2017 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace spec\Tidal\PhpSpec\ConsoleExtension\Command;

use Tidal\PhpSpec\ConsoleExtension\Command\Configurator;
use Tidal\PhpSpec\ConsoleExtension\Command\GenericCommand;
use Tidal\PhpSpec\ConsoleExtension\Contract\Command\ConfigInterface as Config;
use spec\Tidal\PhpSpec\ConsoleExtension\Behavior\Command\IsConfiguratorSpecTrait;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use RuntimeException;

/**
* class spec\Tidal\PhpSpec\ConsoleExtension\Command\ConfiguratorSpec
*/
class ConfiguratorSpec extends ObjectBehavior
{
    use IsConfiguratorSpecTrait;

    function it_is_initializable()
    {
        $this->shouldHaveType(Configurator::class);
    }

    function it_accepts_commands(GenericCommand $command)
    {
        $this->accept($command)->shouldReturn(true);
    }

    function it_throws_exception_with_no_config(GenericCommand $command)
    {
        $this
            ->shouldThrow(RuntimeException::class)
            ->during('configure', array($command));
    }

    function it_throws_no_exception_with_config(GenericCommand $command)
    {
        $this->setConfig([
            Config::NAME_KEY => 'foo'
        ]);

        $this
            ->shouldNotThrow(RuntimeException::class)
            ->during('configure', array($command));
    }

    function it_configures_name(GenericCommand $command)
    {
        $value = 'foo';

        $this->setConfig([
            Config::NAME_KEY => $value
        ]);

        $command->setName($value)
            ->shouldBeCalled();

        $this->configure($command);
    }

    function it_configures_description(GenericCommand $command)
    {
        $value = 'foo';

        $this->setConfig([
            Config::DESCRIPTION_KEY => $value
        ]);

        $command->setDescription($value)
            ->shouldBeCalled();

        $this->configure($command);
    }

    function it_configures_help(GenericCommand $command)
    {
        $value = 'foo';

        $this->setConfig([
            Config::HELP_KEY => $value
        ]);

        $command->setHelp($value)
            ->shouldBeCalled();

        $this->configure($command);
    }

    function it_configures_hidden(GenericCommand $command)
    {
        $value = true;

        $this->setConfig([
            Config::HIDDEN_KEY => $value
        ]);

        $command->setHidden($value)
            ->shouldBeCalled();

        $this->configure($command);
    }

    function it_configures_arguments(GenericCommand $command)
    {
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

    function it_configures_options(GenericCommand $command)
    {
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


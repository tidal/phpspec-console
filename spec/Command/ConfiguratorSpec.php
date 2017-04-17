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

}


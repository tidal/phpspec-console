<?php
/**
 * This file is part of the phpspec-console package.
 * (c) 2017 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace spec\Tidal\PhpSpec\ConsoleExtension\Command;

use Tidal\PhpSpec\ConsoleExtension\Writer;
use Tidal\PhpSpec\ConsoleExtension\Command\GenericCommand;
use Tidal\PhpSpec\ConsoleExtension\Contract\Command\ConfiguratorInterface;
use Tidal\PhpSpec\ConsoleExtension\Contract\Command\ConfigInterface as Config;
use spec\Tidal\PhpSpec\ConsoleExtension\Behavior\HasWriterSpecTrait;
use spec\Tidal\PhpSpec\ConsoleExtension\Behavior\Command\IsConfigurableSpecTrait;
use PhpSpec\ObjectBehavior;

/**
* class spec\Tidal\PhpSpec\ConsoleExtension\Command\GenericCommandSpec
*/
class GenericCommandSpec extends ObjectBehavior
{
    use IsConfigurableSpecTrait,
        HasWriterSpecTrait;

    ////////////////////////////////////////////
    ///                SETUP                 ///
    ////////////////////////////////////////////

    function let(Writer $writer, ConfiguratorInterface $configurator)
    {
        $this->beConstructedWith(
            $writer,
            $configurator,
            [Config::NAME_KEY => 'foo']
        );
    }

    ////////////////////////////////////////////
    ///                TESTS                 ///
    ////////////////////////////////////////////

    //-> CONSTRUCTION <-//


    function it_is_initializable()
    {
        $this->shouldHaveType(GenericCommand::class);
    }
}


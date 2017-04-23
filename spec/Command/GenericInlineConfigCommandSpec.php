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
use Tidal\PhpSpec\ConsoleExtension\Contract\Command\ConfiguratorInterface;
use Tidal\PhpSpec\ConsoleExtension\Command\GenericInlineConfigCommand;
use Tidal\PhpSpec\ConsoleExtension\Contract\Command\ConfigInterface as Config;
use spec\Tidal\PhpSpec\ConsoleExtension\Behavior\{
    HasWriterSpecTrait,
    HasContainerSpecTrait
};
use spec\Tidal\PhpSpec\ConsoleExtension\Behavior\Command\{
    IsConfigurableSpecTrait,
    HasInputSpecTrait,
    HasOutputSpecTrait
};
use PhpSpec\ObjectBehavior;

/**
* class spec\Tidal\PhpSpec\ConsoleExtension\Command\GenericInlineConfigCommandSpec
*/
class GenericInlineConfigCommandSpec extends ObjectBehavior
{
    use IsConfigurableSpecTrait,
        HasWriterSpecTrait,
        HasContainerSpecTrait,
        HasInputSpecTrait,
        HasOutputSpecTrait;

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
        $this->shouldHaveType(GenericInlineConfigCommand::class);
    }
}

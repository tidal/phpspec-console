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
use spec\Tidal\PhpSpec\ConsoleExtension\Behavior\Command\IsConfiguratorSpecTrait;
use PhpSpec\ObjectBehavior;

/**
* class spec\Tidal\PhpSpec\ConsoleExtension\Command\ConfiguratorSpec
*/
class ConfiguratorSpec extends ObjectBehavior
{
    use IsConfiguratorSpecTrait;

    function it_is_initializable()
    {
        $this->shouldImplement(Configurator::class);
    }
}


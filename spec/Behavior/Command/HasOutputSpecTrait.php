<?php
/**
 * This file is part of the phpspec-console package.
 * (c) 2017 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Tidal\PhpSpec\ConsoleExtension\Behavior\Command;

use spec\Tidal\PhpSpec\ConsoleExtension\Behavior\Prophecy\HasOutputMockTrait;
use Prophecy\Prophecy\MethodProphecy;

/**
 * Trait spec\Tidal\PhpSpec\ConsoleExtension\Behavior\Command\HasOutputSpecTrait
 *
 * @method MethodProphecy setOutput($input)
 * @method MethodProphecy getOutput()
 */
trait HasOutputSpecTrait
{
    use HasOutputMockTrait;

    function its_output_is_accessible()
    {
        $input = $this->createOutputMock();

        $this->setOutput($input);
        $this->getOutput()->shouldReturn($input);
    }
}


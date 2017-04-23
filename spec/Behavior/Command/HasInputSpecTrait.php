<?php
/**
 * This file is part of the phpspec-console package.
 * (c) 2017 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Tidal\PhpSpec\ConsoleExtension\Behavior\Command;

use spec\Tidal\PhpSpec\ConsoleExtension\Behavior\Prophecy\HasInputMockTrait;
use Prophecy\Prophecy\MethodProphecy;

/**
 * Trait spec\Tidal\PhpSpec\ConsoleExtension\Behavior\Command\HasInputSpecTrait
 *
 * @method MethodProphecy setInput($input)
 * @method MethodProphecy getInput()
 */
trait HasInputSpecTrait
{
    use HasInputMockTrait;

    function its_input_is_accessible()
    {
        $input = $this->createInputMock();

        $this->setInput($input);
        $this->getInput()->shouldReturn($input);
    }
}

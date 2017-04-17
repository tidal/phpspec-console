<?php
/**
 * This file is part of the phpspec-console package.
 * (c) 2017 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace %namespace%;

use %subject%;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
* class %namespace%\%name%
*/
class %name% extends ObjectBehavior
{

    function it_is_initializable()
    {
        $this->shouldHaveType(%subject_class%::class);
    }
}

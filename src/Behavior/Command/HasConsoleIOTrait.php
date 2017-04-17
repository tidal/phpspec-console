<?php
/**
 * This file is part of the phpspec-console package.
 * (c) 2017 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tidal\PhpSpec\ConsoleExtension\Behavior\Command;

use PhpSpec\Console\ConsoleIO;

/**
 * trait Tidal\PhpSpec\ConsoleExtension\Behavior\Command\HasConsoleIOTrait
 */
trait HasConsoleIOTrait
{
    /**
     * @var ConsoleIO
     */
    private $consoleIO;

    /**
     * @param ConsoleIO $consoleIO
     */
    public function setConsoleIO(ConsoleIO $consoleIO)
    {
        $this->consoleIO = $consoleIO;
    }

    /**
     * @return ConsoleIO
     */
    public function getConsoleIO()
    {
        return $this->consoleIO;
    }
}


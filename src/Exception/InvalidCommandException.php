<?php
/**
 * This file is part of the phpspec-console package.
 * (c) 2017 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tidal\PhpSpec\ConsoleExtension\Exception;

use Tidal\PhpSpec\ConsoleExtension\Contract\Command\CommandInterface;
use InvalidArgumentException;
use Throwable;

class InvalidCommandException extends InvalidArgumentException
{
    private const MESSAGE_PATTERN = "Command '%s' is not accepted by Configurator";

    /**
     * InvalidCommandException constructor.
     * @param CommandInterface $command
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(CommandInterface $command, int $code = 0, Throwable $previous = null)
    {
        parent::__construct(
            self::generateMessage(
                get_class($command)
            ),
            $code,
            $previous
        );
    }

    /**
     * @param string $commandClass
     * @return string
     */
    private static function generateMessage(string $commandClass)
    {
        return(sprintf(
            self::MESSAGE_PATTERN,
            $commandClass
        ));
    }
}

<?php
/**
 * This file is part of the phpspec-console package.
 * (c) 2017 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tidal\PhpSpec\ConsoleExtension\Contract;

/**
 * interface Tidal\PhpSpec\ConsoleExtension\Contract\WriterInterface
 */
interface WriterInterface
{
    public function confirm(string $pattern, array $arguments = [], bool $default = true): bool;

    public function writeError(string $message): void;
}
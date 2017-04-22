<?php
/**
 * This file is part of the phpspec-console package.
 * (c) 2017 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tidal\PhpSpec\ConsoleExtension\Contract\Command;

/**
 * interface Tidal\PhpSpec\ConsoleExtension\Contract\Command\ConfigInterface
 */
interface ConfigInterface
{
    public const NAME_KEY = 'name';
    public const SHORTCUT_KEY = 'shortcut';
    public const DESCRIPTION_KEY = 'description';
    public const HELP_KEY = 'help';
    public const HIDDEN_KEY = 'hidden';
    public const USAGES_KEY = 'usages';
    public const ARGUMENTS_KEY = 'arguments';
    public const OPTIONS_KEY = 'options';
    public const MODE_KEY = 'mode';
    public const SCALAR_CONFIG = [
        self::NAME_KEY,
        self::DESCRIPTION_KEY,
        self::HELP_KEY,
        self::HIDDEN_KEY,
        self::SHORTCUT_KEY
    ];
}


<?php
/**
 * This file is part of the phpspec-console package.
 * (c) 2017 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Tidal\PhpSpec\ConsoleExtension\Contract\Command;

use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\{
    InputDefinition,
    InputInterface
};
use Symfony\Component\Console\Exception\{
    InvalidArgumentException,
    LogicException
};

/**
 * interface Tidal\PhpSpec\ConsoleExtension\Contract\Command\CommandInterface
 */
interface CommandInterface
{
    /**
     * Runs the command.
     *
     * The code to execute is either defined directly with the
     * setCode() method or by overriding the execute() method
     * in a sub-class.
     *
     * @param InputInterface  $input  An InputInterface instance
     * @param OutputInterface $output An OutputInterface instance
     *
     * @return int The command exit code
     *
     * @see setCode()
     * @see execute()
     */
    public function run(InputInterface $input, OutputInterface $output);

    /**
     * Sets the code to execute when running this command.
     *
     * If this method is used, it overrides the code defined
     * in the execute() method.
     *
     * @param callable $code A callable(InputInterface $input, OutputInterface $output)
     *
     * @return $this
     *
     * @throws InvalidArgumentException
     *
     * @see execute()
     */
    public function setCode(callable $code);

    /**
     * Sets an array of argument and option instances.
     *
     * @param array|InputDefinition $definition An array of argument and option instances or a definition instance
     *
     * @return $this
     */
    public function setDefinition($definition);

    /**
     * Gets the InputDefinition attached to this Command.
     *
     * @return InputDefinition An InputDefinition instance
     */
    public function getDefinition();

    /**
     * Adds an argument.
     *
     * @param string $name        The argument name
     * @param int    $mode        The argument mode: InputArgument::REQUIRED or InputArgument::OPTIONAL
     * @param string $description A description text
     * @param mixed  $default     The default value (for InputArgument::OPTIONAL mode only)
     *
     * @return $this
     */
    public function addArgument($name, $mode = null, $description = '', $default = null);

    /**
     * Adds an option.
     *
     * @param string $name        The option name
     * @param string $shortcut    The shortcut (can be null)
     * @param int    $mode        The option mode: One of the InputOption::VALUE_* constants
     * @param string $description A description text
     * @param mixed  $default     The default value (must be null for InputOption::VALUE_NONE)
     *
     * @return $this
     */
    public function addOption($name, $shortcut = null, $mode = null, $description = '', $default = null);

    /**
     * Sets the name of the command.
     *
     * This method can set both the namespace and the name if
     * you separate them by a colon (:)
     *
     *     $command->setName('foo:bar');
     *
     * @param string $name The command name
     *
     * @return $this
     *
     * @throws InvalidArgumentException When the name is invalid
     */
    public function setName($name);

    /**
     * Returns the command name.
     *
     * @return string The command name
     */
    public function getName();

    /**
     * @param bool $hidden Whether or not the command should be hidden from the list of commands
     *
     * @return $this Command The current instance
     */
    public function setHidden($hidden);

    /**
     * @return bool Whether the command should be publicly shown or not.
     */
    public function isHidden();

    /**
     * Sets the description for the command.
     *
     * @param string $description The description for the command
     *
     * @return $this
     */
    public function setDescription($description);

    /**
     * Returns the description for the command.
     *
     * @return string The description for the command
     */
    public function getDescription();

    /**
     * Sets the help for the command.
     *
     * @param string $help The help for the command
     *
     * @return $this
     */
    public function setHelp($help);

    /**
     * Returns the help for the command.
     *
     * @return string The help for the command
     */
    public function getHelp();

    /**
     * Returns the processed help for the command replacing the %command.name% and
     * %command.full_name% patterns with the real values dynamically.
     *
     * @return string The processed help for the command
     */
    public function getProcessedHelp();

    /**
     * Sets the aliases for the command.
     *
     * @param string[] $aliases An array of aliases for the command
     *
     * @return $this
     *
     * @throws InvalidArgumentException When an alias is invalid
     */
    public function setAliases($aliases);

    /**
     * Returns the aliases for the command.
     *
     * @return array An array of aliases for the command
     */
    public function getAliases();

    /**
     * Returns the synopsis for the command.
     *
     * @param bool $short Whether to show the short version of the synopsis (with options folded) or not
     *
     * @return string The synopsis
     */
    public function getSynopsis($short = false);

    /**
     * Add a command usage example.
     *
     * @param string $usage The usage, it'll be prefixed with the command name
     *
     * @return $this
     */
    public function addUsage($usage);

    /**
     * Returns alternative usages of the command.
     *
     * @return array
     */
    public function getUsages();

    /**
     * Gets a helper instance by name.
     *
     * @param string $name The helper name
     *
     * @return mixed The helper value
     *
     * @throws LogicException           if no HelperSet is defined
     * @throws InvalidArgumentException if the helper is not defined
     */
    public function getHelper($name);
}


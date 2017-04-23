<?php
/**
 * This file is part of the phpspec-console package.
 * (c) 2017 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tidal\PhpSpec\ConsoleExtension\Behavior\Command;

use Symfony\Component\Console\Input\InputInterface;

/**
 * Trait Tidal\PhpSpec\ConsoleExtension\Behavior\Command\HasInputTrait */
trait HasInputTrait
{
    /**
     * @var InputInterface
     */
    protected $input;

    /**
     * @param InputInterface $input
     */
    public function setInput(InputInterface $input)
    {
        $this->input = $input;
    }

    /**
     * @return InputInterface
     */
    public function getInput(): InputInterface
    {
        return $this->input;
    }
}


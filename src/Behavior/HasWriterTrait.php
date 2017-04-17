<?php
/**
 * This file is part of the phpspec-console package.
 * (c) 2017 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tidal\PhpSpec\ConsoleExtension\Behavior;

use Tidal\PhpSpec\ConsoleExtension\Contract\WriterInterface;

/**
 * trait Tidal\PhpSpec\ConsoleExtension\BehaviorHasWriterTrait
 */
trait HasWriterTrait
{
    /**
     * @var WriterInterface
     */
    private $writer;

    /**
     * @param WriterInterface $writer
     */
    public function setWriter(WriterInterface $writer)
    {
        $this->writer = $writer;
    }

    /**
     * @return WriterInterface
     */
    public function getWriter(): WriterInterface
    {
        return $this->writer;
    }
}


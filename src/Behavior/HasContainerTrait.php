<?php
/**
 * This file is part of the phpspec-console package.
 * (c) 2017 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tidal\PhpSpec\ConsoleExtension\Behavior;

use PhpSpec\ServiceContainer;

/**
 * trait Tidal\PhpSpec\ConsoleExtension\BehaviorHasWriterTrait
 */
trait HasContainerTrait
{
    /**
     * @var ServiceContainer
     */
    private $container;

    /**
     * @param ServiceContainer $container
     */
    public function setContainer(ServiceContainer $container)
    {
        $this->container = $container;
    }

    /**
     * @return ServiceContainer
     */
    public function getContainer(): ServiceContainer
    {
        return $this->container;
    }

    public function configureContainer()
    {
        if (method_exists($this->getContainer(), 'configure')) {
            $this->getContainer()->configure();
        }
    }
}
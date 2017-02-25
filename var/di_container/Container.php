<?php
namespace Var;

use WoohooLabs\Zen\AbstractContainer;

class Container extends AbstractContainer
{
    /**
     * @var string[]
     */
    protected $entryPoints = [
        \Var\Container::class => 'Var__Container',
        \Interop\Container\ContainerInterface::class => 'Interop__Container__ContainerInterface',
    ];

    protected function Var__Container()
    {
        return $this;
    }

    protected function Interop__Container__ContainerInterface()
    {
        $entry = $this->singletonEntries['Var__Container'] ?? $this->Var__Container();

        return $this->singletonEntries['Interop__Container__ContainerInterface'] = $entry;
    }
}

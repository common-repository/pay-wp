<?php

declare (strict_types=1);
namespace WPPayVendor\JMS\Serializer\EventDispatcher;

use WPPayVendor\JMS\Serializer\Context;
use WPPayVendor\JMS\Serializer\VisitorInterface;
class Event
{
    /**
     * @var bool Whether no further event listeners should be triggered
     */
    private $propagationStopped = \false;
    /**
     * @var array
     */
    protected $type;
    /**
     * @var Context
     */
    private $context;
    public function __construct(\WPPayVendor\JMS\Serializer\Context $context, array $type)
    {
        $this->context = $context;
        $this->type = $type;
    }
    public function getVisitor() : \WPPayVendor\JMS\Serializer\VisitorInterface
    {
        return $this->context->getVisitor();
    }
    public function getContext() : \WPPayVendor\JMS\Serializer\Context
    {
        return $this->context;
    }
    public function getType() : array
    {
        return $this->type;
    }
    /**
     * Returns whether further event listeners should be triggered.
     *
     * @see Event::stopPropagation()
     *
     * @return bool Whether propagation was already stopped for this event
     */
    public function isPropagationStopped() : bool
    {
        return $this->propagationStopped;
    }
    /**
     * Stops the propagation of the event to further event listeners.
     *
     * If multiple event listeners are connected to the same event, no
     * further event listener will be triggered once any trigger calls
     * stopPropagation().
     */
    public function stopPropagation() : void
    {
        $this->propagationStopped = \true;
    }
}

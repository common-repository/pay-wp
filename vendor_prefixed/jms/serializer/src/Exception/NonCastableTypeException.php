<?php

declare (strict_types=1);
namespace WPPayVendor\JMS\Serializer\Exception;

abstract class NonCastableTypeException extends \WPPayVendor\JMS\Serializer\Exception\RuntimeException
{
    /**
     * @var mixed
     */
    private $value;
    /**
     * @param mixed $value
     */
    public function __construct(string $expectedType, $value)
    {
        $this->value = $value;
        parent::__construct(\sprintf('Cannot convert value of type "%s" to %s', \gettype($value), $expectedType));
    }
    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}

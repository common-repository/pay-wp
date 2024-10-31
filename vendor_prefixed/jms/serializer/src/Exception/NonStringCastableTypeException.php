<?php

declare (strict_types=1);
namespace WPPayVendor\JMS\Serializer\Exception;

final class NonStringCastableTypeException extends \WPPayVendor\JMS\Serializer\Exception\NonCastableTypeException
{
    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        parent::__construct('string', $value);
    }
}

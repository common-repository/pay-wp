<?php

declare (strict_types=1);
namespace WPPayVendor\JMS\Serializer\Annotation;

/**
 * @Annotation
 * @Target({"CLASS","PROPERTY"})
 *
 * @deprecated use `@ReadOnlyProperty` instead
 */
#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_PROPERTY)]
final class DeprecatedReadOnly extends \WPPayVendor\JMS\Serializer\Annotation\ReadOnlyProperty
{
}

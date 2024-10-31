<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace WPPayVendor\Symfony\Component\CssSelector\Node;

/**
 * Represents a "<selector>.<name>" node.
 *
 * This component is a port of the Python cssselect library,
 * which is copyright Ian Bicking, @see https://github.com/SimonSapin/cssselect.
 *
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 *
 * @internal
 */
class ClassNode extends \WPPayVendor\Symfony\Component\CssSelector\Node\AbstractNode
{
    private $selector;
    private $name;
    public function __construct(\WPPayVendor\Symfony\Component\CssSelector\Node\NodeInterface $selector, string $name)
    {
        $this->selector = $selector;
        $this->name = $name;
    }
    public function getSelector() : \WPPayVendor\Symfony\Component\CssSelector\Node\NodeInterface
    {
        return $this->selector;
    }
    public function getName() : string
    {
        return $this->name;
    }
    /**
     * {@inheritdoc}
     */
    public function getSpecificity() : \WPPayVendor\Symfony\Component\CssSelector\Node\Specificity
    {
        return $this->selector->getSpecificity()->plus(new \WPPayVendor\Symfony\Component\CssSelector\Node\Specificity(0, 1, 0));
    }
    public function __toString() : string
    {
        return \sprintf('%s[%s.%s]', $this->getNodeName(), $this->selector, $this->name);
    }
}

<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace WPPayVendor\Symfony\Component\CssSelector\Parser\Shortcut;

use WPPayVendor\Symfony\Component\CssSelector\Node\ElementNode;
use WPPayVendor\Symfony\Component\CssSelector\Node\SelectorNode;
use WPPayVendor\Symfony\Component\CssSelector\Parser\ParserInterface;
/**
 * CSS selector element parser shortcut.
 *
 * This component is a port of the Python cssselect library,
 * which is copyright Ian Bicking, @see https://github.com/SimonSapin/cssselect.
 *
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 *
 * @internal
 */
class ElementParser implements \WPPayVendor\Symfony\Component\CssSelector\Parser\ParserInterface
{
    /**
     * {@inheritdoc}
     */
    public function parse(string $source) : array
    {
        // Matches an optional namespace, required element or `*`
        // $source = 'testns|testel';
        // $matches = array (size=3)
        //     0 => string 'testns|testel' (length=13)
        //     1 => string 'testns' (length=6)
        //     2 => string 'testel' (length=6)
        if (\preg_match('/^(?:([a-z]++)\\|)?([\\w-]++|\\*)$/i', \trim($source), $matches)) {
            return [new \WPPayVendor\Symfony\Component\CssSelector\Node\SelectorNode(new \WPPayVendor\Symfony\Component\CssSelector\Node\ElementNode($matches[1] ?: null, $matches[2]))];
        }
        return [];
    }
}

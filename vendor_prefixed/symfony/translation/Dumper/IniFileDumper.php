<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace WPPayVendor\Symfony\Component\Translation\Dumper;

use WPPayVendor\Symfony\Component\Translation\MessageCatalogue;
/**
 * IniFileDumper generates an ini formatted string representation of a message catalogue.
 *
 * @author Stealth35
 */
class IniFileDumper extends \WPPayVendor\Symfony\Component\Translation\Dumper\FileDumper
{
    /**
     * {@inheritdoc}
     */
    public function formatCatalogue(\WPPayVendor\Symfony\Component\Translation\MessageCatalogue $messages, string $domain, array $options = [])
    {
        $output = '';
        foreach ($messages->all($domain) as $source => $target) {
            $escapeTarget = \str_replace('"', '\\"', $target);
            $output .= $source . '="' . $escapeTarget . "\"\n";
        }
        return $output;
    }
    /**
     * {@inheritdoc}
     */
    protected function getExtension()
    {
        return 'ini';
    }
}

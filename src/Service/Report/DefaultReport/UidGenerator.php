<?php

namespace Chetkov\PHPCleanArchitecture\Service\Report\DefaultReport;

/**
 * Trait UidGenerator
 * @package Chetkov\PHPCleanArchitecture\Service\Report\DefaultReport
 */
trait UidGenerator
{
    /**
     * @param string $name
     * @return string
     */
    private function generateUid(string $name): string
    {
        return strtolower(preg_replace('/[ \/\\\]/', '-', $name));
    }
}

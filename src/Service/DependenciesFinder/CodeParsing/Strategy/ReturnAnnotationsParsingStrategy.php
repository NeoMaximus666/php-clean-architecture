<?php

namespace Chetkov\PHPCleanArchitecture\Service\DependenciesFinder\CodeParsing\Strategy;

use Chetkov\PHPCleanArchitecture\Helper\StringHelper;

/**
 * Class ReturnAnnotationsParsingStrategy
 * @package Chetkov\PHPCleanArchitecture\Service\DependenciesFinder\CodeParsing\Strategy
 */
class ReturnAnnotationsParsingStrategy implements CodeParsingStrategyInterface
{
    /**
     * Возвращает типы найденные в аннотациях return
     * @inheritDoc
     */
    public function parse(string $content): array
    {
        $pattern = '/@return\s+(?P<types>[\w|\[\]\\\\\$]*)/ium';
        preg_match_all($pattern, $content, $matches);

        $dependencies = [];
        foreach (array_filter($matches['types']) as $typesAsString) {
            foreach (explode('|', str_replace('[]', '', StringHelper::removeSpaces($typesAsString))) as $type) {
                $dependencies[$type] = true;
            }
        }

        return array_keys($dependencies);
    }
}

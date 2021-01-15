<?php

namespace Epigra\Translation\Services\Translation;

use Epigra\Core\DTO\Base\BaseDTO;
use Epigra\Core\Services\Base\BaseServiceInterface;

/**
 * Interface TranslationServiceInterface
 * @package Epigra\Translation\Services\Translation\Translation
 */
interface TranslationServiceInterface extends BaseServiceInterface
{
    /**Returns a translation by key
     * @param string $key
     * @param string|null $group
     * @return BaseDTO|null
     */
    public function getTranslationByKey(string $key, ?string $group): ?BaseDTO;
}

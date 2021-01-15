<?php

namespace Epigra\Translation\Repositories\Translation;

use Epigra\Core\Repositories\Base\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

interface TranslationRepositoryInterface extends BaseRepositoryInterface
{
    /**Returns a translation by key
     * @param string $key
     * @param string|null $group
     * @return Model|null
     */
    public function getTranslationByKey(string $key, ?string $group): ?Model;
}

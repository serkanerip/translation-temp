<?php

namespace Epigra\Translation\Repositories\Translation;

use Epigra\Core\Exception\NotFoundException;
use Epigra\Translation\Models\Translation;
use Epigra\Core\Repositories\Base\BaseEloquentRepository;
use Illuminate\Database\Eloquent\Model;

class TranslationRepository extends BaseEloquentRepository implements TranslationRepositoryInterface
{
    /**
     * TranslationRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(Translation::class);
    }

    /**
     * @inheritDoc
     */
    public function getTranslationByKey(string $key, ?string $group): ?Model
    {
        $result = $this->model::where('key', $key)
            ->where('group', $group)
            ->first();

        if (empty($result)) {
            throw new NotFoundException('model');
        }

        return $result;
    }
}

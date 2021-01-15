<?php

namespace Epigra\Translation\Services\Translation;

use Epigra\Core\DTO\Base\BaseDTO;
use Epigra\Translation\DTO\Translation\TranslationDTO;
use Epigra\Translation\Repositories\Translation\TranslationRepositoryInterface;
use Epigra\Core\Services\Base\BaseService;

class TranslationService extends BaseService implements TranslationServiceInterface
{
    /**
     * @var TranslationRepositoryInterface
     */
    private TranslationRepositoryInterface $repository;


    /**
     * TranslationService constructor.
     * @param TranslationRepositoryInterface $repository
     */
    public function __construct(TranslationRepositoryInterface $repository)
    {
        parent::__construct($repository, TranslationDTO::class);
        $this->repository = $repository;
    }

    /**
     * @inheritDoc
     */
    public function getTranslationByKey(string $key, ?string $group): ?BaseDTO
    {
        $result = $this->repository->getTranslationByKey($key, $group);
        return new TranslationDTO($result->toArray());
    }
}

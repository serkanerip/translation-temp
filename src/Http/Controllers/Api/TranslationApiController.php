<?php

namespace Epigra\Translation\Http\Controllers\Api;

use Epigra\Core\Controller\BaseApiController;
use Epigra\Translation\DTO\Translation\TranslationDTO;
use Epigra\Translation\Services\Translation\TranslationServiceInterface;

class TranslationApiController extends BaseApiController
{
    public function __construct(TranslationServiceInterface $service)
    {
        $this->service = $service;
        $this->dtoClass = TranslationDTO::class;
        parent::__construct($service, $this->dtoClass);
    }

    public function getTranslationByKey(?string $group, string $key) {
        $result = $this->service->getTranslationByKey($key, $group);
        return $this->ok($result);
    }
}

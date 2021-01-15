<?php

namespace Epigra\Translation\DTO\Translation;

use Epigra\Core\DTO\Base\BaseDTO;

/**
 * Class TranslationDTO
 */
class TranslationDTO extends BaseDTO
{
    /**
     * TranslationDTO constructor.
     * @param array $parameters
     */
    public function __construct(array $parameters = [])
    {
        parent::__construct($parameters, self::class);
    }

    /**
     * @var int
     */
    public int $id;

    /**
     * @var string
     */
    public string $group;

    /**
     * @var string
     */
    public string $key;

    /**
     * @var array
     */
    public ?array $text;

    /**
     * @param $dto
     * @param array $originalData
     * @return TranslationDTO
     */
    public function mapToDTO($dto, array $originalData): self
    {
        //you can make a change for each field on
        return $dto;
    }

    /**
     * @param array $parameters
     * @param bool $updateMode
     * @return array
     */
    public function validate(array $parameters, bool $updateMode)
    {
        return $this->validator($parameters, [
            //'name' => 'required|string'
        ]);
    }
}

<?php


namespace App;


use DateTime;

/**
 * Class Service
 * @package App
 */
class Service
{
    /**
     * @var int
     */
    private int $serviceId;
    /**
     * @var int
     */
    private int $variationId = 0;
    /**
     * @var int
     */
    private int $questionTypeId;
    /**
     * @var int
     */
    private int $categoryId = 0;
    /**
     * @var int
     */
    private int $subCategoryId = 0;
    /**
     * @var string
     */
    private string $responseType;
    /**
     * @var DateTime
     */
    private DateTime $date;
    /**
     * @var int
     */
    private int $time;

    /**
     * @return int
     */
    public function getServiceId(): int
    {
        return $this->serviceId;
    }

    /**
     * @param int $serviceId
     */
    public function setServiceId(int $serviceId): void
    {
        $this->serviceId = $serviceId;
    }

    /**
     * @return int
     */
    public function getVariationId(): int
    {
        return $this->variationId;
    }

    /**
     * @param int $variationId
     */
    public function setVariationId(int $variationId): void
    {
        $this->variationId = $variationId;
    }

    /**
     * @return int
     */
    public function getQuestionTypeId(): int
    {
        return $this->questionTypeId;
    }

    /**
     * @param int $questionTypeId
     */
    public function setQuestionTypeId(int $questionTypeId): void
    {
        $this->questionTypeId = $questionTypeId;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    /**
     * @param int $categoryId
     */
    public function setCategoryId(int $categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @return int
     */
    public function getSubCategoryId(): int
    {
        return $this->subCategoryId;
    }

    /**
     * @param int $subCategoryId
     */
    public function setSubCategoryId(int $subCategoryId): void
    {
        $this->subCategoryId = $subCategoryId;
    }

    /**
     * @return string
     */
    public function getResponseType(): string
    {
        return $this->responseType;
    }

    /**
     * @param string $responseType
     */
    public function setResponseType(string $responseType): void
    {
        $this->responseType = $responseType;
    }

    /**
     * @return DateTime
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     */
    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }

    /**
     * @return int
     */
    public function getTime(): int
    {
        return $this->time;
    }

    /**
     * @param int $time
     */
    public function setTime(int $time): void
    {
        $this->time = $time;
    }


}
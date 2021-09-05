<?php


namespace App;


/**
 * Class ServiceFilter
 * @package App
 */
class ServiceFilter
{
    /**
     * @var array
     */
    private array $paramsFilter;
    /**
     * @var array
     */
    private array $dateTime;
    /**
     * @var bool
     */
    private bool $isRange = false;

    /**
     *
     * @param Service $service
     * @return bool
     */
    public function filter(Service $service)
    {
        if ($this->isRange) {

            if (!($service->getDate()->getTimestamp() >= $this->dateTime[0]->getTimestamp())
                or !($service->getDate()->getTimestamp() <= $this->dateTime[1]->getTimestamp())) {
                return false;
            }
        } else {
            if (!($service->getDate() == $this->dateTime[0])) {
                return false;
            }
        }
        foreach ($this->paramsFilter as $key => $property) {

            if ($service->$key() != $property)
                return false;
        }

        return true;
    }

    /**
     * @param array $paramsFilter
     */
    public function setParamsFilter(array $paramsFilter): void
    {
        $this->paramsFilter = $paramsFilter;
    }

    /**
     * @param array $dateTime
     */
    public function setDateTime(array $dateTime): void
    {
        $this->dateTime = $dateTime;
    }

    /**
     * @param bool $isRange
     */
    public function setIsRange(bool $isRange): void
    {
        $this->isRange = $isRange;
    }


}
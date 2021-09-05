<?php

namespace App;


use DateTime;

/**
 * Class Help
 * @package App
 */
class Help
{
    /**
     * This method parse Service from the string
     * @param string $data
     * @return Service
     * @throws \Exception
     */
    public static function createService(string $data): Service
    {
        $service = new Service();

        list($type, $sType, $qType, $rType, $date, $time) = explode(' ', trim($data));

        $temp = explode('.', $sType);

        switch (count($temp)) {
            case 1:
                $service->setServiceId((int)$temp[0]);
                break;
            case 2:
                $service->setServiceId((int)$temp[0]);
                $service->setVariationId((int)$temp[1]);
                break;
        }

        $temp = explode('.', $qType);

        switch (count($temp)) {
            case 1:
                $service->setQuestionTypeId((int)$temp[0]);
                break;
            case 2:
                $service->setQuestionTypeId((int)$temp[0]);
                $service->setCategoryId((int)$temp[1]);
                break;
            case 3:
                $service->setQuestionTypeId((int)$temp[0]);
                $service->setCategoryId((int)$temp[1]);
                $service->setSubCategoryId((int)$temp[2]);
                break;
        }

        $service->setResponseType($rType);

        $service->setDate(new DateTime($date));

        $service->setTime($time);

        return $service;
    }

    /**
     * This method counts the time spent on responses
     * @param string $line
     * @param array $serviceList
     * @return string
     */
    public static function generateStatisticAnalytic(string $line, array $serviceList): string
    {
        $serviceFilter = self::parseQuery($line);
        $results = array_filter($serviceList, array($serviceFilter, "filter"));
        if(count($results) > 0){
            $count = $total = 0;
            foreach ($results as $result){
                $count++;
                $total += $result->getTime();
            }
             return $total/$count;
        }
        return '-';
    }

    /**
     * This method parse Query from the string
     * @param string $data
     * @return ServiceFilter
     * @throws \Exception
     */
    public static function parseQuery(string $data): ServiceFilter
    {
        $serviceFilter = new ServiceFilter();
        $paramsFilter = [];
        list($type, $sType, $qType, $rType, $date) = explode(' ', trim($data));

        if ($sType !== '*') {
            $temp = explode('.', $sType);

            switch (count($temp)) {
                case 1:
                    $paramsFilter['getServiceId'] = (int)$temp[0];
                    break;
                case 2:
                    $paramsFilter['getServiceId'] = (int)$temp[0];
                    $paramsFilter['getVariationId'] = (int)$temp[1];
                    break;
            }
        }

        if ($qType !== '*') {
            $temp = explode('.', $qType);

            switch (count($temp)) {
                case 1:
                    $paramsFilter['getQuestionTypeId'] = (int)$temp[0];
                    break;
                case 2:
                    $paramsFilter['getQuestionTypeId'] = (int)$temp[0];
                    $paramsFilter['getCategoryId'] = (int)$temp[1];
                    break;
                case 3:
                    $paramsFilter['getQuestionTypeId'] = (int)$temp[0];
                    $paramsFilter['getCategoryId'] = (int)$temp[1];
                    $paramsFilter['getSubCategoryId'] = (int)$temp[2];
                    break;
            }
        }

        $paramsFilter['getResponseType'] = (string)$rType;

        $temp = explode('-', $date);

        switch (count($temp)) {
            case 1:
                $serviceFilter->setDateTime([new DateTime($temp[0])]);
                break;
            case 2:
                $serviceFilter->setDateTime([new DateTime($temp[0]), new DateTime($temp[1])]);
                $serviceFilter->setIsRange(true);
                break;
        }

        $serviceFilter->setParamsFilter($paramsFilter);

        return $serviceFilter;
    }

}
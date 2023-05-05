<?php

namespace App\Services;

use App\Services\HashIdService;

trait HelperService
{

    public function idEncode($id)
    {
        return (new HashIdService())->encode($id);
    }

    public function idDecode($id)
    {
        return (new HashIdService())->decode($id);
    }

    public function checkEmptyArray($array)
    {
        $newArray = [];
        foreach ($array as $key => $value)
            $newArray[$key] = $value;

        return (empty($newArray)) ? true : false;
    }

    public function arrayIdDecode($array)
    {
        $newArray = [];
        foreach ($array as $key => $value)
            $newArray[$key] = (new HashIdService())->decode($value["id"]);

        return $newArray;
    }
}

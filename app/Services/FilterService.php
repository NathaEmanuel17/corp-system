<?php

namespace App\Services;

class FilterService
{
    public static function filter(array $data, array $customFilters): array
    {
        unset($data['page']);
        foreach ($customFilters as $sourceKey => $targetKey) {
            if (isset($data[$sourceKey]) && $data[$sourceKey] !== '') {
                $data[$targetKey] = $data[$sourceKey];
            }
            unset($data[$sourceKey]);
        }
        
        return $data;
    }
}

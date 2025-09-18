<?php

namespace App\Filters;

trait FilterTrait
{
    public function ProductFilters($query, array $filters = [])
    {
        if (isset($filters['min_price'])) {
            $query->where('price', '>=', $filters['min_price']);
        }
        if (isset($filters['max_price'])) {
            $query->where('price', '<=', $filters['max_price']);
        }
        return $query;
    }
}

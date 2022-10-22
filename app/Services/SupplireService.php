<?php

namespace App\Services;

use App\Repositories\SupplierRepository;

/**
 * Class SupplireService
 * @package App\Services
 */
class SupplireService
{
    protected Php artisan make:service;
    public function __construct(SupplierRepository $supplierRepository) {
        $this->supplireRepository = $supplierRepository;
    }

}

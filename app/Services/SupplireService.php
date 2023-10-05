<?php

namespace App\Services;

use App\Repositories\SupplierRepository;

/**
 * Class SupplireService
 * @package App\Services
 */
class SupplireService
{
    protected $supplierRepository;
    public function __construct(SupplierRepository $supplierRepository) {
        $this->supplierRepository = $supplierRepository;
    }

}

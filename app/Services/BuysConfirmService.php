<?php

namespace App\Services;

use App\Repositories\BuysConfirmRepository;
use App\Services\Globals\ResponsesService;

/**
 * Class BuysConfirmService
 * @package App\Services
 */
class BuysConfirmService
{
    protected $buysConfirmRepository;
    public function __construct(BuysConfirmRepository $buysConfirmRepository)
    {
        $this->buysConfirmRepository = $buysConfirmRepository;
    }

    public function getAll()
    {
        return ResponsesService::success($this->buysConfirmRepository->getAll());
    }

    public function store(array $data)
    {
        return ResponsesService::success($this->buysConfirmRepository->store($data));
    }

    public function delete(int $id)
    {
        return ResponsesService::success($this->buysConfirmRepository->delete($id));
    }

    public function update(array $data)
    {
        return ResponsesService::success($this->buysConfirmRepository->update($data));
    }
}

<?php

namespace App\Services;

use App\Repositories\FileRepository;
use App\Repositories\FilesCategoryRepository;

class FileService
{
    protected $fileRepository,$filesCategoryRepository;
    public function __construct(FileRepository $fileRepository,FilesCategoryRepository $filesCategoryRepository)
    {
        $this->fileRepository = $fileRepository;
        $this->filesCategoryRepository = $filesCategoryRepository;
    }

    public function getAll(){
        return $this->fileRepository->getAll();
    }

    public function store($data){
        $validated = $data->validated();
        return $this->fileRepository->store($validated);
    }

    public function delete($id){
        return $this->fileRepository->delete($id);
    }

    public function update($data){
        $validated = $data->validated();
        return $this->fileRepository->update($validated);
    }

    public function storeFileInStorage($data){
        $result['url'] = $data['file']->store($data['localRoute']);
        $result['file'] = '';
        return $result;
    }

    public function storeFileInStorageAndFilesTable($data){
        $validated = $data->validated();
        $validated['localRoute'] = $this->filesCategoryRepository->getById($data['filesCategory_id'])->link;
        $validated['user_id'] = UserService::getUserId();
        $result = array_replace($validated, $this->storeFileInStorage($validated));
        return $this->fileRepository->store($result);
    }
}

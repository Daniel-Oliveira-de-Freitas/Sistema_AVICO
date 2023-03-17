<?php 

namespace App\Repositories\Contracts;

interface GenericRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function update(int $id,  array $arr);
    public function destroy(int $id);
}
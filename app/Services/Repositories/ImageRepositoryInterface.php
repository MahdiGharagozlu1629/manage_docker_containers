<?php

namespace App\Services\Repositories;

use App\Services\ScopedInterface;

interface ImageRepositoryInterface extends ScopedInterface
{
    public function getAll();
    public function dropDown();
    public function remove($reference);
    public function add(array $data);
}

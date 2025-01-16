<?php

namespace App\Services\Repositories;

use App\Services\ScopedInterface;

interface ContainerRepositoryInterface extends ScopedInterface
{

    public function getAll();

    public function getById($id);

    public function stop($id);

    public function remove($id);

    public function add(array $attributes);
}

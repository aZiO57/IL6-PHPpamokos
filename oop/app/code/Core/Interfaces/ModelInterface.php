<?php

declare(strict_types=1);

namespace Core\Interfaces;

interface ModelInterface
{

    public function load(int $id);

    public function assignData();
}

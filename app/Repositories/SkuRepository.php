<?php

namespace App\Repositories;

use App\Sku;
use App\Contracts\SkuRepositoryInterface;

class SkuRepository extends BaseRepository implements SkuRepositoryInterface
{
    /**
     * @var string $class
     */
    protected $class = Sku::class;

    /**
     * @var \App\Sku $sku
     */
    protected $sku;

    public function __construct(Sku $sku)
    {
        $this->sku = $sku;
    }

    public function class()
    {
        return $this->class;
    }

    public function model()
    {
        return $this->sku;
    }

    public function create(array $data)
    {
        return $this->model()->create($data);
    }

    public function update($id, array $data)
    {
        return $this->model()->find($id)->update($data);
    }
}

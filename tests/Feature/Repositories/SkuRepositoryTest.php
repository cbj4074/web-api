<?php

namespace Tests\Feature\Repositories;

use DB;

use App\Contracts\SkuRepositoryInterface;

class SkuRepositoryTest extends RepositoryCrudTestCase
{
    /**
     * @inheritdoc
     */
    public function setRepository()
    {
        $this->repo = resolve(SkuRepositoryInterface::class);
    }

    /**
     * @inheritdoc
     */
    public function test_method_create_storesNewResource()
    {
        $flacFile = factory($this->repo->class())->make()->toArray();

        $this->assertInstanceOf(
            $this->repo->class(),
            $this->repo->create($flacFile)
        );
    }

    /**
     * @inheritdoc
     */
    public function test_method_update_updatesResource()
    {
        $sku = factory($this->repo->class())->create();

        $newValue = 'Foo Bar';

        $property = 'description';

        $this->repo->update($sku->id, [
            $property => $newValue,
        ]);

        $this->assertTrue(
            $this->repo->findById($sku->id)->{$property} === $newValue
        );
    }

    /**
     * @inheritdoc
     */
    public function test_method_update_returnsModelInstance()
    {
        $sku = factory($this->repo->class())->create();

        $updated = $this->repo->update($sku->id, []);

        $this->assertInstanceOf($this->repo->class(), $updated);
    }

    /**
     * @inheritdoc
     */
    public function test_method_delete_deletesResource()
    {
        $sku = factory($this->repo->class())->create();

        DB::transaction(function () use ($sku) {
            $sku->delete();
        });

        $this->assertNull($this->repo->findById($sku->id));
    }
}

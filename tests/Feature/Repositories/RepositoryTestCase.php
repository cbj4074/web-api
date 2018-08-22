<?php

namespace Tests\Feature\Repositories;

use DatabaseSeeder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

abstract class RepositoryTestCase extends TestCase
{
    use RefreshDatabase;

    /**
     * @var $repo
     */
    protected $repo;

    public function setUp()
    {
        parent::setUp();

        $this->seed(DatabaseSeeder::class);

        $this->setRepository();
    }

    /**
     * Sets the $repo property.
     *
     * @return void
     */
    abstract public function setRepository();

    /**
     * Ensure the property $repo is instantiable.
     *
     * @return void
     */
    public function test_property_repo_isInstantiable()
    {
        $this->assertTrue($this->isInstantiable($this->repo));
    }

    /**
     * Ensure the method class() returns a string.
     *
     * @return void
     */
    public function test_method_class_returnsString()
    {
        $this->assertTrue(is_string($this->repo->class()));
    }

    /**
     * Ensure the method class() can be instantiated.
     *
     * @return void
     */
    public function test_method_class_isInstantiable()
    {
        $this->assertTrue($this->isInstantiable($this->repo->class()));
    }

    /**
     * Ensure the method model() is an instance of Model.
     *
     * @return void
     */
    public function test_method_model_isInstanceOfModel()
    {
        $this->assertInstanceOf($this->repo->class(), $this->repo->model());
    }

    /**
     * Ensure the method all() returns a Collection containing instances ONLY of Model.
     *
     * @return void
     */
    public function test_method_all_returnsOnlyCollectionOfModels()
    {
        $models = $this->repo->all();
        $this->assertInstanceOf(Collection::class, $models);
        $this->assertContainsOnlyInstancesOf($this->repo->class(), $models);
    }

    /**
     * Ensure the method findById() returns an instance of the model with the ID of 1.
     *
     * @return void
     */
    public function test_method_findById_returnsInstanceOfModelWithIdOfOne()
    {
        $model = $this->repo->findById(1);
        $this->assertInstanceOf($this->repo->class(), $model);
        $this->assertTrue($model->id === 1);
    }

    /**
     * Ensure the create() method creates a new record in the database.
     *
     * @return void
     */
    abstract public function test_method_create_storesNewModel();

    /**
     * Ensure that the update() method updates the model record in the database.
     *
     * @return void
     */
    abstract public function test_method_update_updatesModel();

    /**
     * Ensure that the delete() method deletes the model record from the database.
     *
     * @return void
     */
    public function test_method_delete_deletesModel()
    {
        $model = $this->repo->findById(1);

        $model->delete();

        $this->assertNull($this->repo->findById($model->id));
    }
}

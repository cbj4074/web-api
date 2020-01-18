<?php

namespace Tests\Feature\Controllers;

use CountriesSeeder;

use App\Contracts\CountryRepositoryInterface;
use App\Contracts\ArtistRepositoryInterface;
use App\Contracts\ProfileRepositoryInterface;
use App\Http\Requests\StoreArtist;
use App\Http\Requests\UpdateArtist;

class CatalogEntityRegistrationControllerTest extends ControllerTestCase
{

    /**
     * @var ArtistRepositoryInterface $artist
     */
    protected $artist;

    /**
     * @var ProfileRepositoryInterface $profile
     */
    protected $profile;

    /**
     * @var StoreArtist
     */
    protected $storeArtist;

    /**
     * @var UpdateArtist
     */
    protected $updateArtist;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(CountriesSeeder::class);

        $this->artist = resolve(ArtistRepositoryInterface::class);
        $this->profile = resolve(ProfileRepositoryInterface::class);

        $this->storeArtist = new StoreArtist();
        $this->updateArtist = new UpdateArtist();
    }

    public function /*test_*/userCanRequestArtistProfile()
    {

    }
}

<?php

use Faker\Factory as Faker;
use App\Models\FtthLocation;
use App\Repositories\FtthLocationRepository;

trait MakeFtthLocationTrait
{
    /**
     * Create fake instance of FtthLocation and save it in database
     *
     * @param array $ftthLocationFields
     * @return FtthLocation
     */
    public function makeFtthLocation($ftthLocationFields = [])
    {
        /** @var FtthLocationRepository $ftthLocationRepo */
        $ftthLocationRepo = App::make(FtthLocationRepository::class);
        $theme = $this->fakeFtthLocationData($ftthLocationFields);
        return $ftthLocationRepo->create($theme);
    }

    /**
     * Get fake instance of FtthLocation
     *
     * @param array $ftthLocationFields
     * @return FtthLocation
     */
    public function fakeFtthLocation($ftthLocationFields = [])
    {
        return new FtthLocation($this->fakeFtthLocationData($ftthLocationFields));
    }

    /**
     * Get fake data of FtthLocation
     *
     * @param array $postFields
     * @return array
     */
    public function fakeFtthLocationData($ftthLocationFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'description' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $ftthLocationFields);
    }
}

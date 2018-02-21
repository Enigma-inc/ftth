<?php

use Faker\Factory as Faker;
use App\Models\PackagesLookup;
use App\Repositories\PackagesLookupRepository;

trait MakePackagesLookupTrait
{
    /**
     * Create fake instance of PackagesLookup and save it in database
     *
     * @param array $packagesLookupFields
     * @return PackagesLookup
     */
    public function makePackagesLookup($packagesLookupFields = [])
    {
        /** @var PackagesLookupRepository $packagesLookupRepo */
        $packagesLookupRepo = App::make(PackagesLookupRepository::class);
        $theme = $this->fakePackagesLookupData($packagesLookupFields);
        return $packagesLookupRepo->create($theme);
    }

    /**
     * Get fake instance of PackagesLookup
     *
     * @param array $packagesLookupFields
     * @return PackagesLookup
     */
    public function fakePackagesLookup($packagesLookupFields = [])
    {
        return new PackagesLookup($this->fakePackagesLookupData($packagesLookupFields));
    }

    /**
     * Get fake data of PackagesLookup
     *
     * @param array $postFields
     * @return array
     */
    public function fakePackagesLookupData($packagesLookupFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'data_bundle' => $fake->word,
            'price' => $fake->randomDigitNotNull,
            'type' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $packagesLookupFields);
    }
}

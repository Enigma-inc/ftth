<?php

use Faker\Factory as Faker;
use App\Models\FtthApplication;
use App\Repositories\FtthApplicationRepository;

trait MakeFtthApplicationTrait
{
    /**
     * Create fake instance of FtthApplication and save it in database
     *
     * @param array $ftthApplicationFields
     * @return FtthApplication
     */
    public function makeFtthApplication($ftthApplicationFields = [])
    {
        /** @var FtthApplicationRepository $ftthApplicationRepo */
        $ftthApplicationRepo = App::make(FtthApplicationRepository::class);
        $theme = $this->fakeFtthApplicationData($ftthApplicationFields);
        return $ftthApplicationRepo->create($theme);
    }

    /**
     * Get fake instance of FtthApplication
     *
     * @param array $ftthApplicationFields
     * @return FtthApplication
     */
    public function fakeFtthApplication($ftthApplicationFields = [])
    {
        return new FtthApplication($this->fakeFtthApplicationData($ftthApplicationFields));
    }

    /**
     * Get fake data of FtthApplication
     *
     * @param array $postFields
     * @return array
     */
    public function fakeFtthApplicationData($ftthApplicationFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'title' => $fake->word,
            'name' => $fake->word,
            'surname' => $fake->word,
            'email' => $fake->word,
            'phone_mobile' => $fake->word,
            'phone_home' => $fake->word,
            'phone_office' => $fake->word,
            'passport' => $fake->word,
            'postal_address' => $fake->word,
            'physical_address' => $fake->word,
            'location_id' => $fake->randomDigitNotNull,
            'applicant_banking_details_id' => $fake->randomDigitNotNull,
            'applicant_service_type_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $ftthApplicationFields);
    }
}

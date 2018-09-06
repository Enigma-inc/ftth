<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFtthLocationAPIRequest;
use App\Http\Requests\API\UpdateFtthLocationAPIRequest;
use App\Models\FtthLocation;
use App\Repositories\FtthLocationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Http\Resources\LocationResource;
// use App\FtthLocation;

/**
 * Class FtthLocationController
 * @package App\Http\Controllers\API
 */

class FtthLocationAPIController extends AppBaseController
{
    /** @var  FtthLocationRepository */
    private $ftthLocationRepository;

    public function __construct(FtthLocationRepository $ftthLocationRepo)
    {
        $this->ftthLocationRepository = $ftthLocationRepo;
    }

    /**
     * Display a listing of the FtthLocation.
     * GET|HEAD /ftthLocations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $ftthLocations = FtthLocation::all();
        // LocationResource::collection();

        return $ftthLocations;
    }

    /**
     * Store a newly created FtthLocation in storage.
     * POST /ftthLocations
     *
     * @param CreateFtthLocationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFtthLocationAPIRequest $request)
    {
        $input = $request->all();

        $ftthLocations = $this->ftthLocationRepository->create($input);

        return $this->sendResponse($ftthLocations->toArray(), 'Ftth Location saved successfully');
    }

    /**
     * Display the specified FtthLocation.
     * GET|HEAD /ftthLocations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var FtthLocation $ftthLocation */
        $ftthLocation = $this->ftthLocationRepository->findWithoutFail($id);

        if (empty($ftthLocation)) {
            return $this->sendError('Ftth Location not found');
        }

        return $this->sendResponse($ftthLocation->toArray(), 'Ftth Location retrieved successfully');
    }

    /**
     * Update the specified FtthLocation in storage.
     * PUT/PATCH /ftthLocations/{id}
     *
     * @param  int $id
     * @param UpdateFtthLocationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFtthLocationAPIRequest $request)
    {
        $input = $request->all();

        /** @var FtthLocation $ftthLocation */
        $ftthLocation = $this->ftthLocationRepository->findWithoutFail($id);

        if (empty($ftthLocation)) {
            return $this->sendError('Ftth Location not found');
        }

        $ftthLocation = $this->ftthLocationRepository->update($input, $id);

        return $this->sendResponse($ftthLocation->toArray(), 'FtthLocation updated successfully');
    }

    /**
     * Remove the specified FtthLocation from storage.
     * DELETE /ftthLocations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var FtthLocation $ftthLocation */
        $ftthLocation = $this->ftthLocationRepository->findWithoutFail($id);

        if (empty($ftthLocation)) {
            return $this->sendError('Ftth Location not found');
        }

        $ftthLocation->delete();

        return $this->sendResponse($id, 'Ftth Location deleted successfully');
    }
}

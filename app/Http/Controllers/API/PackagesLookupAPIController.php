<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePackagesLookupAPIRequest;
use App\Http\Requests\API\UpdatePackagesLookupAPIRequest;
use App\Models\PackagesLookup;
use App\Repositories\PackagesLookupRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PackagesLookupController
 * @package App\Http\Controllers\API
 */

class PackagesLookupAPIController extends AppBaseController
{
    /** @var  PackagesLookupRepository */
    private $packagesLookupRepository;

    public function __construct(PackagesLookupRepository $packagesLookupRepo)
    {
        $this->packagesLookupRepository = $packagesLookupRepo;
    }

    /**
     * Display a listing of the PackagesLookup.
     * GET|HEAD /packagesLookups
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->packagesLookupRepository->pushCriteria(new RequestCriteria($request));
        $this->packagesLookupRepository->pushCriteria(new LimitOffsetCriteria($request));
        $packagesLookups = $this->packagesLookupRepository->all();

        return $this->sendResponse($packagesLookups->toArray(), 'Packages Lookups retrieved successfully');
    }

    /**
     * Store a newly created PackagesLookup in storage.
     * POST /packagesLookups
     *
     * @param CreatePackagesLookupAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePackagesLookupAPIRequest $request)
    {
        $input = $request->all();

        $packagesLookups = $this->packagesLookupRepository->create($input);

        return $this->sendResponse($packagesLookups->toArray(), 'Packages Lookup saved successfully');
    }

    /**
     * Display the specified PackagesLookup.
     * GET|HEAD /packagesLookups/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PackagesLookup $packagesLookup */
        $packagesLookup = $this->packagesLookupRepository->findWithoutFail($id);

        if (empty($packagesLookup)) {
            return $this->sendError('Packages Lookup not found');
        }

        return $this->sendResponse($packagesLookup->toArray(), 'Packages Lookup retrieved successfully');
    }

    /**
     * Update the specified PackagesLookup in storage.
     * PUT/PATCH /packagesLookups/{id}
     *
     * @param  int $id
     * @param UpdatePackagesLookupAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePackagesLookupAPIRequest $request)
    {
        $input = $request->all();

        /** @var PackagesLookup $packagesLookup */
        $packagesLookup = $this->packagesLookupRepository->findWithoutFail($id);

        if (empty($packagesLookup)) {
            return $this->sendError('Packages Lookup not found');
        }

        $packagesLookup = $this->packagesLookupRepository->update($input, $id);

        return $this->sendResponse($packagesLookup->toArray(), 'PackagesLookup updated successfully');
    }

    /**
     * Remove the specified PackagesLookup from storage.
     * DELETE /packagesLookups/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PackagesLookup $packagesLookup */
        $packagesLookup = $this->packagesLookupRepository->findWithoutFail($id);

        if (empty($packagesLookup)) {
            return $this->sendError('Packages Lookup not found');
        }

        $packagesLookup->delete();

        return $this->sendResponse($id, 'Packages Lookup deleted successfully');
    }
}

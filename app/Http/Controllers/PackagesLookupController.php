<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePackagesLookupRequest;
use App\Http\Requests\UpdatePackagesLookupRequest;
use App\Repositories\PackagesLookupRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PackagesLookupController extends AppBaseController
{
    /** @var  PackagesLookupRepository */
    private $packagesLookupRepository;

    public function __construct(PackagesLookupRepository $packagesLookupRepo)
    {
        $this->packagesLookupRepository = $packagesLookupRepo;
    }

    /**
     * Display a listing of the PackagesLookup.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->packagesLookupRepository->pushCriteria(new RequestCriteria($request));
        $packagesLookups = $this->packagesLookupRepository->all();

        return view('packages_lookups.index')
            ->with('packagesLookups', $packagesLookups);
    }

    /**
     * Show the form for creating a new PackagesLookup.
     *
     * @return Response
     */
    public function create()
    {
        return view('packages_lookups.create');
    }

    /**
     * Store a newly created PackagesLookup in storage.
     *
     * @param CreatePackagesLookupRequest $request
     *
     * @return Response
     */
    public function store(CreatePackagesLookupRequest $request)
    {
        $input = $request->all();

        $packagesLookup = $this->packagesLookupRepository->create($input);

        Flash::success('Packages Lookup saved successfully.');

        return redirect(route('packagesLookups.index'));
    }

    /**
     * Display the specified PackagesLookup.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $packagesLookup = $this->packagesLookupRepository->findWithoutFail($id);

        if (empty($packagesLookup)) {
            Flash::error('Packages Lookup not found');

            return redirect(route('packagesLookups.index'));
        }

        return view('packages_lookups.show')->with('packagesLookup', $packagesLookup);
    }

    /**
     * Show the form for editing the specified PackagesLookup.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $packagesLookup = $this->packagesLookupRepository->findWithoutFail($id);

        if (empty($packagesLookup)) {
            Flash::error('Packages Lookup not found');

            return redirect(route('packagesLookups.index'));
        }

        return view('packages_lookups.edit')->with('packagesLookup', $packagesLookup);
    }

    /**
     * Update the specified PackagesLookup in storage.
     *
     * @param  int              $id
     * @param UpdatePackagesLookupRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePackagesLookupRequest $request)
    {
        $packagesLookup = $this->packagesLookupRepository->findWithoutFail($id);

        if (empty($packagesLookup)) {
            Flash::error('Packages Lookup not found');

            return redirect(route('packagesLookups.index'));
        }

        $packagesLookup = $this->packagesLookupRepository->update($request->all(), $id);

        Flash::success('Packages Lookup updated successfully.');

        return redirect(route('packagesLookups.index'));
    }

    /**
     * Remove the specified PackagesLookup from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $packagesLookup = $this->packagesLookupRepository->findWithoutFail($id);

        if (empty($packagesLookup)) {
            Flash::error('Packages Lookup not found');

            return redirect(route('packagesLookups.index'));
        }

        $this->packagesLookupRepository->delete($id);

        Flash::success('Packages Lookup deleted successfully.');

        return redirect(route('packagesLookups.index'));
    }
}

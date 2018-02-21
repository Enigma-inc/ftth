<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFtthLocationRequest;
use App\Http\Requests\UpdateFtthLocationRequest;
use App\Repositories\FtthLocationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class FtthLocationController extends AppBaseController
{
    /** @var  FtthLocationRepository */
    private $ftthLocationRepository;

    public function __construct(FtthLocationRepository $ftthLocationRepo)
    {
        $this->ftthLocationRepository = $ftthLocationRepo;
    }

    /**
     * Display a listing of the FtthLocation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ftthLocationRepository->pushCriteria(new RequestCriteria($request));
        $ftthLocations = $this->ftthLocationRepository->all();

        return view('ftth_locations.index')
            ->with('ftthLocations', $ftthLocations);
    }

    /**
     * Show the form for creating a new FtthLocation.
     *
     * @return Response
     */
    public function create()
    {
        return view('ftth_locations.create');
    }

    /**
     * Store a newly created FtthLocation in storage.
     *
     * @param CreateFtthLocationRequest $request
     *
     * @return Response
     */
    public function store(CreateFtthLocationRequest $request)
    {
        $input = $request->all();

        $ftthLocation = $this->ftthLocationRepository->create($input);

        Flash::success('Ftth Location saved successfully.');

        return redirect(route('ftthLocations.index'));
    }

    /**
     * Display the specified FtthLocation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ftthLocation = $this->ftthLocationRepository->findWithoutFail($id);

        if (empty($ftthLocation)) {
            Flash::error('Ftth Location not found');

            return redirect(route('ftthLocations.index'));
        }

        return view('ftth_locations.show')->with('ftthLocation', $ftthLocation);
    }

    /**
     * Show the form for editing the specified FtthLocation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ftthLocation = $this->ftthLocationRepository->findWithoutFail($id);

        if (empty($ftthLocation)) {
            Flash::error('Ftth Location not found');

            return redirect(route('ftthLocations.index'));
        }

        return view('ftth_locations.edit')->with('ftthLocation', $ftthLocation);
    }

    /**
     * Update the specified FtthLocation in storage.
     *
     * @param  int              $id
     * @param UpdateFtthLocationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFtthLocationRequest $request)
    {
        $ftthLocation = $this->ftthLocationRepository->findWithoutFail($id);

        if (empty($ftthLocation)) {
            Flash::error('Ftth Location not found');

            return redirect(route('ftthLocations.index'));
        }

        $ftthLocation = $this->ftthLocationRepository->update($request->all(), $id);

        Flash::success('Ftth Location updated successfully.');

        return redirect(route('ftthLocations.index'));
    }

    /**
     * Remove the specified FtthLocation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ftthLocation = $this->ftthLocationRepository->findWithoutFail($id);

        if (empty($ftthLocation)) {
            Flash::error('Ftth Location not found');

            return redirect(route('ftthLocations.index'));
        }

        $this->ftthLocationRepository->delete($id);

        Flash::success('Ftth Location deleted successfully.');

        return redirect(route('ftthLocations.index'));
    }
}

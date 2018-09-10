<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFtthApplicationRequest;
use App\Http\Requests\UpdateFtthApplicationRequest;
use App\Repositories\FtthApplicationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Repositories\ApplicantServiceTypeRepository;
use App\Repositories\ApplicantBankingRepository;
use App\Application;

class FtthApplicationController extends AppBaseController
{
    /** @var  FtthApplicationRepository */
    private $ftthApplicationRepository;
    private $serviceTypeRepository;
    private $bankingRepository;

    public function __construct(FtthApplicationRepository $ftthApplicationRepo, 
    ApplicantServiceTypeRepository $serviceTypeRepo,ApplicantBankingRepository $bankingRepo)
    {
        $this->ftthApplicationRepository = $ftthApplicationRepo;
        $this->serviceTypeRepository=$serviceTypeRepo;
        $this->bankingRepository=$bankingRepo;
    }

    /**
     * Display a listing of the FtthApplication.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->ftthApplicationRepository->pushCriteria(new RequestCriteria($request));
        $ftthApplications = $this->ftthApplicationRepository->all();

        return view('admin.ftth_applications.index')
            ->with('ftthApplications', $ftthApplications);
    }

    /**
     * Show the form for creating a new FtthApplication.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.ftth_applications.create');
    }

    /**
     * Store a newly created FtthApplication in storage.
     *
     * @param CreateFtthApplicationRequest $request
     *
     * @return Response
     */
    public function store(CreateFtthApplicationRequest $request)
    {
        $input = $request->all();

        $
        $ftthApplication = $this->ftthApplicationRepository->create($input);

        Flash::success('Ftth Application saved successfully.');

        return redirect(route('ftthApplications.index'));
    }

    /**
     * Display the specified FtthApplication.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ftthApplication = $this->ftthApplicationRepository->findWithoutFail($id);

        if (empty($ftthApplication)) {
            Flash::error('Ftth Application not found');

            return redirect(route('ftthApplications.index'));
        }

        return view('admin.ftth_applications.show')->with('ftthApplication', $ftthApplication);
    }

    /**
     * Show the form for editing the specified FtthApplication.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ftthApplication = $this->ftthApplicationRepository->findWithoutFail($id);

        if (empty($ftthApplication)) {
            Flash::error('Ftth Application not found');

            return redirect(route('ftthApplications.index'));
        }

        return view('admin.ftth_applications.edit')->with('ftthApplication', $ftthApplication);
    }

    /**
     * Update the specified FtthApplication in storage.
     *
     * @param  int              $id
     * @param UpdateFtthApplicationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFtthApplicationRequest $request)
    {
        $ftthApplication = $this->ftthApplicationRepository->findWithoutFail($id);

        if (empty($ftthApplication)) {
            Flash::error('Ftth Application not found');

            return redirect(route('ftthApplications.index'));
        }

        $ftthApplication = $this->ftthApplicationRepository->update($request->all(), $id);

        Flash::success('Ftth Application updated successfully.');

        return redirect(route('ftthApplications.index'));
    }

    /**
     * Remove the specified FtthApplication from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ftthApplication = $this->ftthApplicationRepository->findWithoutFail($id);

        if (empty($ftthApplication)) {
            Flash::error('Ftth Application not found');

            return redirect(route('ftthApplications.index'));
        }

        $this->ftthApplicationRepository->delete($id);

        Flash::success('Ftth Application deleted successfully.');

        return redirect(route('ftthApplications.index'));
    }
}

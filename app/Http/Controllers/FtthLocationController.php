<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
        $this->disk = Storage::disk(env('FILE_SYSTEM', 'local'));
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

        return view('admin.ftth_locations.index')
            ->with('ftthLocations', $ftthLocations);
    }

    /**
     * Show the form for creating a new FtthLocation.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.ftth_locations.create');
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

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = str_slug($request->input('name') . '-' . time());
            $imagePath = "public/images/ftth_locations/" . $imageName;
            $this->resizeImage($image, $imagePath);
            $input['image'] = $imagePath . '.' . $image->getClientOriginalExtension();
            $ftthLocation = $this->ftthLocationRepository->create($input);

        } else {
             $ftthLocation = $this->ftthLocationRepository->create($input);
        }


        // $ftthLocation = $this->ftthLocationRepository->create($input);

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

        return view('admin.ftth_locations.show')->with('ftthLocation', $ftthLocation);
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

        return view('admin.ftth_locations.edit')->with('ftthLocation', $ftthLocation);
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


        $input = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = str_slug($request->input('name') . '-' . time());
            $imagePath = "public/images/ftth_locations/" . $imageName;
            $this->resizeImage($image, $imagePath);
            $input['image'] = $imagePath . '.' . $image->getClientOriginalExtension();
            $ftthLocation = $this->ftthLocationRepository->update($input, $id);

        } else {
            $ftthLocation = $this->ftthLocationRepository->update($request->all(), $id);
        }


        // $ftthLocation = $this->ftthLocationRepository->update($request->all(), $id);

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

    private function resizeImage(UploadedFile $image, $ImagePath)
    {
        $imageStream = Image::make($image)
            ->fit(800,500)
            ->stream()
            ->detach();
        // $largeImageStream = Image::make($image)
        //     ->fit(1170, 580)
        //     ->stream()
        //     ->detach();
        $this->disk->put($ImagePath . '.' . $image->getClientOriginalExtension(), $imageStream, 'public');
        // $this->disk->put($ImagePath . '_lg.' . $image->getClientOriginalExtension(), $largeImageStream, 'public');
    }
}




<?php declare(strict_types=1);

namespace DTApi\Http\Controllers;

use App\Actions\GetAllJobs;
use App\Actions\GetUsersJobs;
use App\Actions\StoreJob;
use App\Actions\UpdateJob;
use DTApi\Models\Job;
use App\Models\Role;
use DTApi\Http\Requests;
use DTApi\Http\Requests\StoreJobRequest;
use DTApi\Http\Resources\JobResource;
use Illuminate\Http\Request;


/**
 * Class BookingController
 * @package DTApi\Http\Controllers
 */
class BookingController extends Controller
{

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request, GetUsersJobs $getUsersJobs, GetAllJobs $getAllJobs)
    {
        if (Gate::any(['superadmin', 'admin'], $request)) {
            return response($getAllJobs->execute($request));
        }

        $user_id = $request->get('user_id');

        $response = $getUsersJobs->execute($user_id);

        return response($response);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $job = Job::query()->with('translatorJobRel.user')->find($id);

        return new JobResource($job);

    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(StoreJobRequest $request, StoreJob $storeJob)
    {
        $data = $request->all();

        $response = $storeJob->execute($request->__authenticatedUser, $data);

        return response($response);

    }

    /**
     * @param $id
     * @param Request $request
     * @return mixed
     */
    public function update($id, Request $request, UpdateJob $updateJob)
    {
        $data = $request->all();
        $cuser = $request->__authenticatedUser;

        $response = $updateJob->execute($id, array_except($data, ['_token', 'submit']), $cuser);


        return response($response);
    }

}

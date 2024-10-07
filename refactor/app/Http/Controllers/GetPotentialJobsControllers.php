<?php declare(strict_types=1);

namespace DTApi\Http\Controller;

use App\Actions\GetPotentialJobs;
use DTApi\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class GetPotentialJobsControllers
 * @package DTApi\Http\Controllers
 */
class GetPotentialJobsControllers extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request, GetPotentialJobs $getPotentialJobs)
    {

        $data = $request->all();
        $user = $request->__authenticatedUser;

        $response = $getPotentialJobs->execute($user);

        return response($response);

    }
}
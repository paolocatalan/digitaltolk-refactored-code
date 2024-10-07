<?php declare(strict_types=1);

namespace DTApi\Http\Controller;

use App\Actions\GetUsersJobsHistory;
use DTApi\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class GetUsersJobsHistoryControllers
 * @package DTApi\Http\Controllers
 */
class GetUsersJobsHistoryControllers extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request, GetUsersJobsHistory $getUsersJobsHistory)
    {

        if($user_id = $request->get('user_id')) {

            $response = $getUsersJobsHistory->execute($user_id, $request);

            return response($response);
        }

        return null;

    }
}
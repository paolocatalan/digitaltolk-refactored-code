<?php declare(strict_types=1);

namespace DTApi\Http\Controller;

use App\Actions\CancelJob;
use DTApi\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class CancelJobController
 * @package DTApi\Http\Controllers
 */
class CancelJobController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request, CancelJob $cancelJob)
    {
        $data = $request->all();
        $user = $request->__authenticatedUser;

        $response = $cancelJob->execute($data, $user);

        return response($response);
    }
}
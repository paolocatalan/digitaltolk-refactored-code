<?php declare(strict_types=1);

namespace DTApi\Http\Controller;

use App\Actions\EndlJob;
use DTApi\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class EndJobController
 * @package DTApi\Http\Controllers
 */
class EndJobController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request, EndlJob $endJob)
    {
        $data = $request->all();

        $response = $endJob->execute($data);

        return response($response);
    }
}
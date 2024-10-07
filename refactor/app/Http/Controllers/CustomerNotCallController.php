<?php declare(strict_types=1);

namespace DTApi\Http\Controller;

use App\Actions\CustomerNotCall;
use DTApi\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class CustomerNotCallController
 * @package DTApi\Http\Controllers
 */
class CustomerNotCallController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request, CustomerNotCall $customerNotCall)
    {
        $data = $request->all();

        $response = $customerNotCall->execute($data);

        return response($response);
    }
}
<?php declare(strict_types=1);

namespace DTApi\Http\Controller;

use App\Actions\AcceptJob;
use DTApi\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class AcceptJobController
 * @package DTApi\Http\Controllers
 */
class AcceptJobController extends Controller
{
    public function __invoke(Request $request, AcceptJob $acceptJob)
    {
        $data = $request->all();
        $user = $request->__authenticatedUser;

        $response = $acceptJob->execute($data, $user);

        return response($response);
    }
}
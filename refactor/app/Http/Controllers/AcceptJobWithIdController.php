<?php declare(strict_types=1);

namespace DTApi\Http\Controller;

use App\Actions\AcceptJobWithId;
use DTApi\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class AcceptJobController
 * @package DTApi\Http\Controllers
 */
class AcceptJobWithIdController extends Controller
{
    public function __invoke(Request $request, AcceptJobWithId $acceptJobWithId)
    {
        $data = $request->get('job_id');
        $user = $request->__authenticatedUser;

        $response = $acceptJobWithId->execute($data, $user);

        return response($response);
    }
}
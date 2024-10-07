<?php declare(strict_types=1);

namespace DTApi\Http\Controller;

use App\Actions\Reopen;
use DTApi\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class ReopenController
 * @package DTApi\Http\Controllers
 */
class ReopenController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request, Reopen $reopen)
    {
        $data = $request->all();

        $response = $reopen->execute($data);

        return response($response);
    }
}
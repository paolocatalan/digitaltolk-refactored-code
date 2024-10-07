<?php declare(strict_types=1);

namespace DTApi\Http\Controller;

use App\Actions\StoreJobEmail;
use DTApi\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class StoreJobEmailControllers
 * @package DTApi\Http\Controllers
 */
class StoreJobEmailControllers extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request, StoreJobEmail $storeJobEmail)
    {
        $adminSenderEmail = config('app.adminemail');
        $data = $request->all();

        $response = $storeJobEmail->execute($data);

        return response($response);

    }
}

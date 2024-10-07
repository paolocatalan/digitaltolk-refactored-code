<?php declare(strict_types=1);

namespace DTApi\Http\Controller;

use App\Services\JobServices;
use App\Services\NotificationServices;
use DTApi\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class JobNotificationController
 * @package DTApi\Http\Controllers
 */
class JobNotificationController extends Controller
{

    public function __construct(
        protected NotificationServices $notification,
        protected JobServices $jobServices
    ) {}


    public function resendNotifications(Request $request)
    {
        $data = $request->all();
        $job = Job::find($data['jobid']);
        $job_data = $this->jobServices->jobToData($job);
        $this->notification->sendNotificationTranslator($job, $job_data, '*');

        return response(['success' => 'Push sent']);
    }

    /**
     * Sends SMS to Translator
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function resendSMSNotifications(Request $request)
    {
        $data = $request->all();
        $job = Job::find($data['jobid']);
        $job_data = $this->jobServices->jobToData($job);

        try {
            $this->notification->sendSMSNotificationToTranslator($job);
            return response(['success' => 'SMS sent']);
        } catch (\Exception $e) {
            return response(['success' => $e->getMessage()]);
        }
    }
}
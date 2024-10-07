<?php declare(strict_types=1);

namespace DTApi\Http\Controllers;

use DTApi\Models\Job;
use DTApi\Http\Requests;
use DTApi\Models\Distance;
use Illuminate\Http\Request;


/**
 * Class DistanceFeedController
 * @package DTApi\Http\Controllers
 */
class DistanceFeedController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->all();

        if (isset($data['distance']) && $data['distance'] != "") {
            $distance = $data['distance'];
        } else {
            $distance = "";
        }
        if (isset($data['time']) && $data['time'] != "") {
            $time = $data['time'];
        } else {
            $time = "";
        }
        if (isset($data['jobid']) && $data['jobid'] != "") {
            $jobid = $data['jobid'];
        }

        if (isset($data['session_time']) && $data['session_time'] != "") {
            $session = $data['session_time'];
        } else {
            $session = "";
        }

        if ($data['flagged'] == 'true') {
            if($data['admincomment'] == '') return "Please, add comment";
            $flagged = 'yes';
        } else {
            $flagged = 'no';
        }
        
        if ($data['manually_handled'] == 'true') {
            $manually_handled = 'yes';
        } else {
            $manually_handled = 'no';
        }

        if ($data['by_admin'] == 'true') {
            $by_admin = 'yes';
        } else {
            $by_admin = 'no';
        }

        if (isset($data['admincomment']) && $data['admincomment'] != "") {
            $admincomment = $data['admincomment'];
        } else {
            $admincomment = "";
        }
        if ($time || $distance) {

            $affectedRows = Distance::where('job_id', '=', $jobid)->update(array('distance' => $distance, 'time' => $time));
        }

        if ($admincomment || $session || $flagged || $manually_handled || $by_admin) {

            $affectedRows1 = Job::where('id', '=', $jobid)->update(array('admin_comments' => $admincomment, 'flagged' => $flagged, 'session_time' => $session, 'manually_handled' => $manually_handled, 'by_admin' => $by_admin));

        }

        return response('Record updated!');
    }

}
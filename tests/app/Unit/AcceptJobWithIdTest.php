<?php

namespace Tests\Unit;

use App\Actions\AcceptJobWithId;
use App\Services\NotificationServices;
use PHPUnit\Framework\TestCase;

class AcceptJobWithIdTest extends TestCase
{
    /** @test */
    public function it_can_accept_job_with_id(NotificationServices $notification): void
    {
        $job_id = [];
        $cuser = [];

        (new AcceptJobWithId($notification))->execute($job_id, $cuser);

        $this->assertSee([
            'status' => 'success'
           ]);
    }
}

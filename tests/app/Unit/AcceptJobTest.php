<?php

namespace Tests\Unit;

use App\Actions\AcceptJob;
use PHPUnit\Framework\TestCase;

class AcceptJobTest extends TestCase
{
    /** @test */
    public function it_can_accept_job(): void
    {
        $data = [];

        (new AcceptJob())->execute($data, $data->__authenticatedUser);

        $this->assertSee([
            'status' => 'success'
           ]);
    }
}

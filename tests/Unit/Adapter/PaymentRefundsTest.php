<?php

namespace BGaeteAlvear\PayPal\Tests\Unit\Adapter;

use PHPUnit\Framework\TestCase;
use BGaeteAlvear\PayPal\Tests\MockClientClasses;
use BGaeteAlvear\PayPal\Tests\MockResponsePayloads;

class PaymentRefundsTest extends TestCase
{
    use MockClientClasses;
    use MockResponsePayloads;

    /** @test */
    public function it_can_show_details_for_a_refund()
    {
        $expectedResponse = $this->mockGetRefundDetailsResponse();

        $expectedMethod = 'showRefundDetails';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockCredentials(), true);

        $mockClient->getAccessToken();

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}('1JU08902781691411'));
    }
}

<?php

namespace BGaeteAlvear\PayPal\Tests\Unit\Adapter;

use PHPUnit\Framework\TestCase;
use BGaeteAlvear\PayPal\Tests\MockClientClasses;
use BGaeteAlvear\PayPal\Tests\MockResponsePayloads;

class PaymentCapturesTest extends TestCase
{
    use MockClientClasses;
    use MockResponsePayloads;

    /** @test */
    public function it_can_show_details_for_a_captured_payment()
    {
        $expectedResponse = $this->mockGetCapturedPaymentDetailsResponse();

        $expectedMethod = 'showCapturedPaymentDetails';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockCredentials(), true);

        $mockClient->getAccessToken();

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}('2GG279541U471931P'));
    }

    /** @test */
    public function it_can_refund_a_captured_payment()
    {
        $expectedResponse = $this->mockRefundCapturedPaymentResponse();

        $expectedMethod = 'refundCapturedPayment';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockCredentials(), true);

        $mockClient->getAccessToken();

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}(
            '2GG279541U471931P',
            'INVOICE-123',
            10.99,
            'Defective product'
        ));
    }
}

<?php

namespace BGaeteAlvear\PayPal\Tests\Unit\Adapter;

use PHPUnit\Framework\TestCase;
use BGaeteAlvear\PayPal\Tests\MockClientClasses;
use BGaeteAlvear\PayPal\Tests\MockRequestPayloads;
use BGaeteAlvear\PayPal\Tests\MockResponsePayloads;

class WebHooksVerificationTest extends TestCase
{
    use MockClientClasses;
    use MockRequestPayloads;
    use MockResponsePayloads;

    /** @test */
    public function it_can_verify_web_hook_signature()
    {
        $expectedResponse = $this->mockVerifyWebHookSignatureResponse();

        $expectedParams = $this->mockVerifyWebHookSignatureParams();

        $expectedMethod = 'verifyWebHook';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockCredentials(), true);

        $mockClient->getAccessToken();

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}($expectedParams));
    }
}

<?php

namespace BGaeteAlvear\PayPal\Tests\Unit;

use PHPUnit\Framework\TestCase;
use BGaeteAlvear\PayPal\Services\PayPal as PayPalClient;
use BGaeteAlvear\PayPal\Tests\MockClientClasses;
use BGaeteAlvear\PayPal\Tests\MockResponsePayloads;

class AdapterTest extends TestCase
{
    use MockClientClasses;
    use MockResponsePayloads;

    /** @test */
    public function it_can_be_instantiated()
    {
        $client = new PayPalClient();

        $this->assertInstanceOf(PayPalClient::class, $client);
    }

    /** @test */
    public function it_can_get_access_token()
    {
        $expectedResponse = $this->mockAccessTokenResponse();

        $expectedMethod = 'getAccessToken';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}());
    }
}

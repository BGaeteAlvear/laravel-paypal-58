<?php

namespace BGaeteAlvear\PayPal\Tests\Unit\Adapter;

use PHPUnit\Framework\TestCase;
use BGaeteAlvear\PayPal\Tests\MockClientClasses;
use BGaeteAlvear\PayPal\Tests\MockRequestPayloads;
use BGaeteAlvear\PayPal\Tests\MockResponsePayloads;

class InvoicesSearchTest extends TestCase
{
    use MockClientClasses;
    use MockRequestPayloads;
    use MockResponsePayloads;

    /** @test */
    public function it_can_search_invoices()
    {
        $expectedResponse = $this->mockSearchInvoicesResponse();

        $expectedParams = $this->invoiceSearchParams();

        $expectedMethod = 'searchInvoices';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockCredentials(), true);

        $mockClient->getAccessToken();

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}($expectedParams, 1, 1, true));
    }
}

<?php

use cebe\openapi\Reader;
use cebe\openapi\spec\Link;

/**
 *
 *
 * @author Alexander Makarov <sam@rmcreative.ru>
 */
class LinkTest extends \PHPUnit\Framework\TestCase
{
    public function testRead()
    {
        /** @var $link Link */
        $link = Reader::readFromJson(<<<JSON
{
    "operationId": "getUserAddress",
    "parameters": {
        "userId": "test.path.id"
    }
}
JSON
        , Link::class);

        $result = $link->validate();
        $this->assertEquals([], $link->getErrors());
        $this->assertTrue($result);

        $this->assertEquals(null, $link->operationRef);
        $this->assertEquals('getUserAddress', $link->operationId);
        $this->assertEquals(['userId' => 'test.path.id'], $link->parameters);
        $this->assertEquals(null, $link->requestBody);
        $this->assertEquals(null, $link->server);
    }

    public function testValidateBothOperationIdAndOperationRef()
    {
        /** @var $link Link */
        $link = Reader::readFromJson(<<<JSON
{
    "operationId": "getUserAddress",
    "operationRef": "getUserAddressRef"
}
JSON
                , Link::class);

        $result = $link->validate();
        $this->assertEquals(['operationId and operationRef are mutually exclusive.'], $link->getErrors());
        $this->assertFalse($result);
    }
}

<?php

declare(strict_types=1);

namespace Deviantintegral\Har\Tests\Unit;

use Deviantintegral\Har\Initiator;
use GuzzleHttp\Psr7\Uri;

/**
 * @covers \Deviantintegral\Har\Initiator
 */
class InitiatorTest extends HarTestBase
{
    public function testInitiatorWithTypeOther()
    {
        $serializer = $this->getSerializer();

        $initiator = (new Initiator())
            ->setType('other');
        $serialized = $serializer->serialize($initiator, 'json');
        $this->assertEquals(
            ['type' => 'other'],
            json_decode($serialized, true)
        );

        $this->assertDeserialize($serialized, Initiator::class, $initiator);

        $this->assertFalse($initiator->hasUrl());
        $this->assertNull($initiator->getUrl());
        $this->assertFalse($initiator->hasLineNumber());
        $this->assertNull($initiator->getLineNumber());
    }

    public function testInitiatorWithTypeParser()
    {
        $serializer = $this->getSerializer();

        $initiator = (new Initiator())
            ->setType('parser')
            ->setUrl(new Uri('https://www.php.net/'))
            ->setLineNumber(42);
        $serialized = $serializer->serialize($initiator, 'json');
        $this->assertEquals(
            [
                'type' => 'parser',
                'url' => 'https://www.php.net/',
                'lineNumber' => '42',
            ],
            json_decode($serialized, true)
        );

        $this->assertDeserialize($serialized, Initiator::class, $initiator);
        $this->assertTrue($initiator->hasLineNumber());
        $this->assertIsNumeric($initiator->getLineNumber());
        $this->assertTrue($initiator->hasUrl());
        $this->assertNotNull($initiator->getUrl());
    }
}

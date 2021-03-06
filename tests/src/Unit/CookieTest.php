<?php

declare(strict_types=1);

namespace Deviantintegral\Har\Tests\Unit;

use Deviantintegral\Har\Cookie;
use Deviantintegral\NullDateTime\NullDateTime;

/**
 * @covers \Deviantintegral\Har\Cookie
 */
class CookieTest extends HarTestBase
{
    public function testSerialize()
    {
        $serializer = $this->getSerializer();

        $cookie = (new Cookie())
          ->setComment('Test comment')
          ->setCookie('Test cookie')
          ->setDomain('www.example.com')
          ->setPath('/')
          ->setExpires(new NullDateTime())
          ->setHttpOnly(true)
          ->setSecure(true)
          ->setValue('Test value');

        $serialized = $serializer->serialize($cookie, 'json');
        $this->assertEquals(
          [
            'comment' => $cookie->getComment(),
            'cookie' => $cookie->getCookie(),
            'domain' => $cookie->getDomain(),
            'path' => $cookie->getPath(),
            'expires' => '',
            'httpOnly' => $cookie->isHttpOnly(),
            'secure' => $cookie->isSecure(),
            'value' => $cookie->getValue(),
          ],
          json_decode($serialized, true)
        );

        $this->assertDeserialize($serialized, Cookie::class, $cookie);
    }
}

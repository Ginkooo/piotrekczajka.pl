<?php

use PHPUnit\Framework\TestCase;

final class RequestHandlerTest extends TestCase
{
    public function testCanEncapsulateRequest()
    {
        $_REQUEST = ['controller' => 'home', 'action' => 'index'];
        $request1 = RequestHandler::getRequest();

        $_REQUEST = ['action' => 'index'];
        $request2 = RequestHandler::getRequest();

        $_REQUEST = ['controller' => 'home'];
        $request3 = RequestHandler::getRequest();

        $_REQUEST = ['foo' => 'bar'];
        $request4 = RequestHandler::getRequest();

        $this->assertEquals('home', $request1->controller);
        $this->assertEquals('index', $request1->action);

        $this->assertEquals('home', $request2->controller);
        $this->assertEquals('index', $request2->action);

        $this->assertEquals('home', $request3->controller);
        $this->assertEquals('index', $request3->action);

        $this->assertEquals('home', $request4->controller);
        $this->assertEquals('index', $request4->action);
        $this->assertTrue(isset($request4->params['foo']));
        $this->assertContains('bar', $request4->params);
    }

    public function testAcceptsOnlyLetters()
    {
        $this->expectException(\InvalidArgumentException::class);

        $_REQUEST = ['controller' => 'home1'];
        $request1 = RequestHandler::getRequest();

        $_REQUEST = ['controller' => 'ho.me'];
        $request2 = RequestHandler::getRequest();

        $_REQUEST = ['controller' => '&home'];
        $request3 = RequestHandler::getRequest();
    }
}

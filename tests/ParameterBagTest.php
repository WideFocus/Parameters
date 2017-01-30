<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Parameters\Tests;


use PHPUnit_Framework_TestCase;
use WideFocus\Parameters\ParameterBag;

/**
 * @coversDefaultClass \WideFocus\Parameters\ParameterBag
 */
class ParameterBagTest extends PHPUnit_Framework_TestCase
{
    /**
     * @return ParameterBag
     *
     * @covers ::__construct
     */
    public function testConstructor(): ParameterBag
    {
        return new ParameterBag();
    }

    /**
     * @return void
     *
     * @covers ::has
     * @covers ::get
     */
    public function testHasGet()
    {
        $bag = new ParameterBag(['foo' => 'Foo']);
        $this->assertTrue($bag->has('foo'));
        $this->assertFalse($bag->has('bar'));
        $this->assertSame('Foo', $bag->get('foo'));
    }

    /**
     * @return void
     *
     * @covers ::with
     */
    public function testWith()
    {
        $bag = new ParameterBag();
        $new = $bag->with('foo', 'Foo');
        $this->assertFalse($bag->has('foo'));
        $this->assertTrue($new->has('foo'));
        $this->assertSame('Foo', $new->get('foo'));
    }

    /**
     * @return void
     *
     * @covers ::without
     */
    public function testWithout()
    {
        $bag = new ParameterBag(['foo' => 'Foo']);
        $new = $bag->without('foo');
        $this->assertTrue($bag->has('foo'));
        $this->assertFalse($new->has('foo'));
    }

    /**
     * @return void
     *
     * @covers ::getIterator
     */
    public function testGetIterator()
    {
        $data = ['foo' => 'Foo', 'bar' => 'Bar'];
        $bag  = new ParameterBag($data);
        $this->assertEquals($data, iterator_to_array($bag));
    }
}

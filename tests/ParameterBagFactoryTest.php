<?php
/**
 * Copyright WideFocus. See LICENSE.txt.
 * https://www.widefocus.net
 */

namespace WideFocus\Parameters\Tests;

use ArrayIterator;
use PHPUnit_Framework_TestCase;
use WideFocus\Parameters\ParameterBagFactory;
use WideFocus\Parameters\ParameterBagInterface;

/**
 * @coversDefaultClass \WideFocus\Parameters\ParameterBagFactory
 */
class ParameterBagFactoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @param array $data
     *
     * @return ParameterBagInterface
     *
     * @dataProvider dataProvider
     *
     * @covers ::createBag
     */
    public function testCreateBag(array $data): ParameterBagInterface
    {
        $factory = new ParameterBagFactory();

        $bag = $factory->createBag($data);
        $this->assertEquals($data, iterator_to_array($bag));
        return $bag;
    }

    /**
     * @param array $data
     *
     * @return ParameterBagInterface
     *
     * @dataProvider dataProvider
     *
     * @covers ::createFromTraversable
     */
    public function testCreateFromTraversable(array $data): ParameterBagInterface
    {
        $factory = new ParameterBagFactory();

        $bag = $factory->createFromTraversable(new ArrayIterator($data));
        $this->assertEquals($data, iterator_to_array($bag));
        return $bag;
    }

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [[['foo' => 'Foo', 'bar' => 'Bar']]];
    }
}

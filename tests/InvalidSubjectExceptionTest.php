<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Feed\Source\Builder\Tests\Field;

use PHPUnit\Framework\TestCase;
use WideFocus\Parameters\InvalidSubjectException;

/**
 * @coversDefaultClass \WideFocus\Parameters\InvalidSubjectException
 */
class InvalidSubjectExceptionTest extends TestCase
{
    /**
     * @return void
     *
     * @expectedException \WideFocus\Parameters\InvalidSubjectException
     * @expectedExceptionMessage Expected an object but got string.
     *
     * @throws InvalidSubjectException Always.
     *
     * @covers ::__construct
     */
    public function testConstructor()
    {
        throw new InvalidSubjectException('foo');
    }
}

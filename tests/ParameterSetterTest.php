<?php
/**
 * Copyright WideFocus. See LICENSE.txt.
 * https://www.widefocus.net
 */

namespace WideFocus\Parameters\Tests;

use PHPUnit_Framework_TestCase;
use WideFocus\Parameters\ParameterBag;
use WideFocus\Parameters\ParameterBagAwareInterface;
use WideFocus\Parameters\ParameterSetter;
use WideFocus\Parameters\Tests\TestDouble\SubjectDouble;

/**
 * @coversDefaultClass \WideFocus\Parameters\ParameterSetter
 */
class ParameterSetterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @return void
     *
     * @covers ::setParameters
     * @covers ::setParameter
     * @covers ::snakeToCamelCase
     */
    public function testSetParameters()
    {
        $subject = $this->createMock(SubjectDouble::class);
        $subject
            ->expects($this->once())
            ->method('setFooParam')
            ->with('Foo');
        $subject
            ->expects($this->once())
            ->method('setBarParam')
            ->with('Bar');

        $setter = new ParameterSetter();
        $setter->setParameters(
            $subject,
            new ParameterBag(['foo_param' => 'Foo', 'bar_param' => 'Bar'])
        );
    }

    /**
     * @return void
     *
     * @covers ::setParameters
     */
    public function testSetParametersToInterface()
    {
        $bag = $this->createMock(ParameterBag::class);

        $subject = $this->createMock(ParameterBagAwareInterface::class);
        $subject->expects($this->once())
            ->method('setParameters')
            ->with($bag);

        $setter = new ParameterSetter();
        $setter->setParameters($subject, $bag);
    }

    /**
     * @return void
     *
     * @expectedException \WideFocus\Parameters\InvalidSubjectException
     *
     * @covers ::setParameters
     */
    public function testSetParametersException()
    {
        $bag = $this->createMock(ParameterBag::class);
        $setter = new ParameterSetter();
        $setter->setParameters('invalid', $bag);
    }
}

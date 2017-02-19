<?php
/**
 * Copyright WideFocus. See LICENSE.txt.
 * https://www.widefocus.net
 */

namespace WideFocus\Parameters;

/**
 * Sets parameters on subjects.
 */
interface ParameterSetterInterface
{
    /**
     * Set parameters on a subject.
     *
     * @param mixed                 $subject
     * @param ParameterBagInterface $parameters
     *
     * @return void
     *
     * @throws InvalidSubjectException When the subject is not an object.
     */
    public function setParameters($subject, ParameterBagInterface $parameters);
}
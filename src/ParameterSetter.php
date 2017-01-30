<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Parameters;

/**
 * Sets parameters on subjects.
 */
class ParameterSetter implements ParameterSetterInterface
{
    /**
     * Set parameters on a subject.
     *
     * @param mixed                 $subject
     * @param ParameterBagInterface $parameters
     *
     * @return void
     */
    public function setParameters($subject, ParameterBagInterface $parameters)
    {
        if (!is_object($subject)) {
            throw new InvalidSubjectException(
                sprintf(
                    'Expected an object but got %s.',
                    gettype($subject)
                )
            );
        }
        if ($subject instanceof ParameterBagAwareInterface) {
            $subject->setParameters($parameters);
        } else {
            foreach ($parameters as $key => $value) {
                $this->setParameter($subject, $key, $value);
            }
        }
    }

    /**
     * Set a parameter on a subject.
     *
     * @param mixed  $subject
     * @param string $key
     * @param mixed  $value
     */
    private function setParameter($subject, $key, $value)
    {
        $setter = 'set' . $this->snakeToCamelCase($key);
        if (is_callable([$subject, $setter])) {
            call_user_func([$subject, $setter], $value);
        }
    }

    /**
     * Convert a string to camel case.
     *
     * @param string $value
     *
     * @return string
     */
    private function snakeToCamelCase(string $value): string
    {
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $value)));
    }
}
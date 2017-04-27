<?php
/**
 * Copyright WideFocus. See LICENSE.txt.
 * https://www.widefocus.net
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
     *
     * @throws InvalidSubjectException When the subject is not an object.
     */
    public function setParameters($subject, ParameterBagInterface $parameters)
    {
        if (!is_object($subject)) {
            throw new InvalidSubjectException($subject);
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
     *
     * @return void
     */
    private function setParameter($subject, string $key, $value)
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

<?php
/**
 * Copyright WideFocus. See LICENSE.txt.
 * https://www.widefocus.net
 */

namespace WideFocus\Parameters;

use InvalidArgumentException;

/**
 * Exception thrown when the subject of an argument setter is not an object.
 */
class InvalidSubjectException extends InvalidArgumentException
{
    /**
     * Constructor.
     *
     * @param mixed $subject
     */
    public function __construct($subject)
    {
        parent::__construct(
            sprintf(
                'Expected an object but got %s.',
                gettype($subject)
            )
        );
    }
}

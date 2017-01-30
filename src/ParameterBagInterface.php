<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Parameters;

use IteratorAggregate;

interface ParameterBagInterface extends IteratorAggregate
{
    /**
     * Whether a parameter has been set.
     *
     * @param string $name
     *
     * @return bool
     */
    public function has(string $name): bool;

    /**
     * Get a parameter.
     *
     * @param string $name
     * @param mixed  $default
     *
     * @return mixed
     */
    public function get(string $name, $default = null);

    /**
     * Get an instance with a value.
     *
     * @param string $name
     * @param mixed  $value
     * @return ParameterBagInterface
     */
    public function with(string $name, $value): ParameterBagInterface;

    /**
     * Get an instance without a value.
     *
     * @param string $name
     *
     * @return ParameterBagInterface
     */
    public function without(string $name): ParameterBagInterface;
}
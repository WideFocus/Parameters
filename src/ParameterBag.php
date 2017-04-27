<?php
/**
 * Copyright WideFocus. See LICENSE.txt.
 * https://www.widefocus.net
 */

namespace WideFocus\Parameters;

use ArrayIterator;
use Traversable;

class ParameterBag implements ParameterBagInterface
{
    /**
     * @var array
     */
    private $data;

    /**
     * Constructor.
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /**
     * Whether a parameter has been set.
     *
     * @param string $name
     *
     * @return bool
     */
    public function has(string $name): bool
    {
        return array_key_exists($name, $this->data);
    }

    /**
     * Get a parameter.
     *
     * @param string $name
     * @param mixed  $default
     *
     * @return mixed
     */
    public function get(string $name, $default = null)
    {
        if (!array_key_exists($name, $this->data)) {
            return $default;
        }
        return $this->data[$name];
    }

    /**
     * Get an instance with a value.
     *
     * @param string $name
     * @param mixed  $value
     *
     * @return ParameterBagInterface
     */
    public function with(string $name, $value): ParameterBagInterface
    {
        $new = clone $this;

        $new->data[$name] = $value;
        return $new;
    }

    /**
     * Get an instance without a value.
     *
     * @param string $name
     *
     * @return ParameterBagInterface
     */
    public function without(string $name): ParameterBagInterface
    {
        $new = clone $this;

        unset($new->data[$name]);
        return $new;
    }

    /**
     * Retrieve an external iterator.
     *
     * @return Traversable
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->data);
    }
}

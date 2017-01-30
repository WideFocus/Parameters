<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Parameters;

use Traversable;

/**
 * Creates parameters objects.
 */
class ParameterBagFactory implements ParameterBagFactoryInterface
{
    /**
     * Create a parameters object.
     *
     * @param array $data
     *
     * @return ParameterBagInterface
     */
    public function createBag(array $data = []): ParameterBagInterface
    {
        return new ParameterBag($data);
    }

    /**
     * Create a parameters object from a traversable object.
     *
     * @param Traversable $source
     *
     * @return ParameterBagInterface
     */
    public function createFromTraversable(Traversable $source): ParameterBagInterface
    {
        return $this->createBag(
            iterator_to_array($source)
        );
    }
}
<?php
/**
 * Copyright WideFocus. See LICENSE.txt.
 * https://www.widefocus.net
 */

namespace WideFocus\Parameters;

use Traversable;

/**
 * Creates parameters objects.
 */
interface ParameterBagFactoryInterface
{
    /**
     * Create a parameters object.
     *
     * @param array $data
     *
     * @return ParameterBagInterface
     */
    public function createBag(array $data = []): ParameterBagInterface;

    /**
     * Create a parameters object from a traversable object.
     *
     * @param Traversable $source
     *
     * @return ParameterBagInterface
     */
    public function createFromTraversable(Traversable $source): ParameterBagInterface;
}

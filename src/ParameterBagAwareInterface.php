<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Parameters;

interface ParameterBagAwareInterface
{
    /**
     * Set parameters from a parameter bag.
     *
     * @param ParameterBagInterface $parameters
     *
     * @return void
     */
    public function setParameters(ParameterBagInterface $parameters);
}
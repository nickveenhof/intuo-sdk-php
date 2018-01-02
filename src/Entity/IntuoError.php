<?php

namespace NickVeenhof\IntuoClient\Entity;

class IntuoError extends Error
{
    /**
     * Gets the 'code' parameter.
     *
     * @return string The error code
     */
    public function getCode()
    {
        return $this->getEntityValue('code', '');
    }
}

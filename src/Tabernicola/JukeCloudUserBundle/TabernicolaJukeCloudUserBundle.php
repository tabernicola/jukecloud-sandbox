<?php

namespace Tabernicola\JukeCloudUserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class TabernicolaJukeCloudUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
    
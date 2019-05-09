<?php
namespace Project\Controller;

use Project\Core\View;

class PagesController
{
    public function defaultAction(): void
    {
        $v = new View('homepage', 'back');
        $v->assign('pseudo', 'prof');
    }
}

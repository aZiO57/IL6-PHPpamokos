<?php

namespace Controller;

use Model\Ad;
use Core\AbstractController;
use Core\Interfaces\ControllerInterface;

class Home extends AbstractController implements ControllerInterface
{
    public function index()
    {
        $this->data['recentAds'] = Ad::getRecentAds();
        $this->data['popularAds'] = Ad::getPopularAds();
        $this->render('parts/home');
    }
}

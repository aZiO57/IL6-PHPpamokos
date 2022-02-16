<?php

namespace Controller;

use Model\Ad;
use Core\AbstractController;

class Home extends AbstractController
{
    public function index()
    {
        $this->data['recentAds'] = Ad::getRecentAds();
        $this->data['popularAds'] = Ad::getPopularAds();
        $this->render('parts/home');
    }
}

<?php

namespace Controller;

use Core\AbstractController;
use Helper\CsvParser;
use Helper\Url;
use Model\Ad;

class Import extends AbstractController
{
    public function execute()
    {
        $csvPath = PROJECT_ROOT_DIR . '/var/import/ads.csv';
        $adsArray = CsvParser::parseCsv($csvPath);
        if ($adsArray !== FALSE) {
            foreach ($adsArray as $adData) {
                $$ad = new Ad();
                $slug = Url::slug($adData['title']);
                while (!Ad::isValueUnic('slug', $slug)) {
                    $slug = $slug . rand(0, 100);
                }
                $ad->setTitle($adData['title']);
                $ad->setDescription($adData['description']);
                $ad->setManufacturerId(1);
                $ad->setModelId(1);
                $ad->setPrice($adData['price']);
                $ad->setYear($adData['years']);
                $ad->setTypeId(1);
                $ad->setUserId($_SESSION['user_id']);
                $ad->setImage($adData['image']);
                $ad->setActive($adData['1']);
                $ad->setSlug($slug);
                $ad->setVin($adData['image']);
                $ad->save();
            }
            unlink($csvPath);
        } else {
            echo 'Nera tinkamo csv failo.';
        }
    }
}

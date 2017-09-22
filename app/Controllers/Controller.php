<?php
namespace app\Controllers;
error_reporting(E_ALL & ~(E_NOTICE| E_WARNING ));

use config;
use \app\models\Price as Price;
/*
 * Class Controller, the controller performs Actions.
 */
class Controller {

    /*
     * Method (Action) indexAction() of controller is executed by default
     */

    public function indexAction() {

        $configParams = new config\Conf();
        $databaseParameters = $configParams -> getConfigParameters();

        $db = new Price($databaseParameters['host'], $databaseParameters['name'], $databaseParameters['password'], $databaseParameters['database']);

        return $params = $db->getPriceType();
    }

    public function viewAction() {

        $configParams = new config\Conf();
        $databaseParameters = $configParams -> getConfigParameters();

        $db = new Price($databaseParameters['host'], $databaseParameters['name'], $databaseParameters['password'], $databaseParameters['database']);

        return $params = $db->getPriceList();
	}

}
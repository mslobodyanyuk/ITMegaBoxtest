<?php
namespace config;

/*
 * class Conf containing config variables, array variables
 */
class Conf
{

    public function getConfigParameters()
    {
        /*config variables array 'databaseParameters'*/
        $databaseParameters = [
            'host' => "localhost",
            'name' => "root",
            'password' => "",
            'database' => "price_list",
        ];
        $result = $databaseParameters;

        return $result;
    }

}
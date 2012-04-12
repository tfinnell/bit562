<?php

require_once(dirname(__FILE__).'/simpletest/autorun.php');
require_once(dirname(__FILE__).'/../php/DataPipeFactory.php');
require_once(dirname(__FILE__).'/../php/tableMap.php');
require_once(dirname(__FILE__).'/../php/tableMapManager.php');
require_once(dirname(__FILE__).'/../php/DBManager.php');

class TestsForDataPipeFactory extends UnitTestCase {
    function testDataPipeFactoryObject() {
        $_REQUEST = array(
            'tableName' => 'codeSnippets',
            'tableMap'  => 'codeSnippets',
            'pipe'      => 'codesnippets',
            'queryType' => 'select',
        );
        include(dirname(__FILE__).'/../php/db_login.php');
        $db_dsn = "mysql:host={$db_host};".
            "dbname={$db_database}";
        $db = new DBManager(
            $db_dsn, $db_username, $db_password);
        $db->open();
        $tm = new TableMapManager($db);
        $snippetsDP = new CodeSnippetsDataPipe($tm, $db);
        $snippetReflection = new ReflectionObject($snippetsDP);
        $datapipe = dataPipeFactory($tm, $db);
        $this->assertIsA($datapipe, CodeSnippetsDataPipe);
    }
}

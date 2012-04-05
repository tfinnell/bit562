<?php

require_once(dirname(__FILE__).'/simpletest/autorun.php');
require_once(dirname(__FILE__).'/../php/baseDataPipe.php');
require_once(dirname(__FILE__).'/../php/db_login.php');
require_once(dirname(__FILE__).'/../php/DBManager.php');
require_once(dirname(__FILE__).'/../php/tableMapManager.php');
require_once(dirname(__FILE__).'/../php/DataPipeFactory.php');

class BaseDataPipeTester extends UnitTestCase {

    function setUp() {

    }
    function testForExistenceOfBasesDataPipe() {
        $this->assertTrue(file_exists(dirname(__FILE__).
            '/../php/baseDataPipe.php'));
    }

<<<<<<< HEAD
        
    function testDataBaseManager() {
        $db_dsn = "mysql:host=localhost;dbname=BIT561";
        $databaseManager = new DBManager(
            $db_dsn, 'mutate', 'motlem420');
        $databaseManager->open();
        $this->assertEqual(get_class($databaseManager), DBManager);
}
    
    function testDataBaseCredentials() {
        $db_database = 'bit561';
        $db_host = 'localhost';
        $db_username = 'mutate';
        $db_password = 'motlem420';

        $this->assertTrue(file_exists(dirname(__FILE__).
            '/../php/db_login.php'));
        $this->assertNotNull($db_username);
        $this->assertNotNull($db_password);
        $this->assertNotNull($db_database);
=======
    function testDataBaseCredentials() {
        $this->assertNotNull($GLOBALS['db_username']);
        $this->assertNotNull($GLOBALS['db_password']);
        $this->assertNotNull($GLOBALS['db_database']);
    }

    function testDataBaseManager() {
        $db_dsn = "mysql:host={$GLOBALS['db_host']};".
            "dbname={$GLOBALS['db_database']}";
        $databaseManager = new DBManager(
            $db_dsn, $GLOBALS['db_username'], $GLOBALS['db_password']);
        $databaseManager->open();
        $this->assertEqual(get_class($databaseManager), DBManager);
>>>>>>> tfinnell/baseDataPipe
    }

#    function testBaseDataPipeObject() {
#        $db_dsn = "mysql:host={$db_host};dbname={$db_database}";
#        $databaseManager = new DBManager(
#            $db_dsn, $db_username, $db_password);
#        $databaseManager->open();
#        $tableMapManager = new TableMapManager($databaseManager);
#        $datapipe = new BaseDataPipe($tableMapManager, $databaseManager);
#    }

}

?>

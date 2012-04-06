<?php

require_once(dirname(__FILE__) . '/simpletest/autorun.php');
require_once(dirname(__FILE__) . '/simpletest/web_tester.php');
require_once(dirname(__FILE__).'/../php/db_login.php');
require_once(dirname(__FILE__).'/../php/DBManager.php');

class TestOfTestsWebDisplay extends UnitTestCase {
    function testDatabaseCredentials() {
        $this->assertNotNull($GLOBALS['db_username']);
        $this->assertNotNull($GLOBALS['db_password']);
        $this->assertNotNull($GLOBALS['db_database']);
    }

    function testDataBaseManager() {
        $db_dsn = "mysql:host={$GLOBALS['db_host']};".
            "dbname={$GLOBALS['db_database']}";
        $databaseManager = new DBManager(
            $db_dsn, $GLOBALS['db_username'], $GLOBALS['db_password']);
        $this->assertIsA($databaseManager, DBManager);
    }

    function testTestTableExistence() {
        $db_dsn = "mysql:host={$GLOBALS['db_host']};".
            "dbname={$GLOBALS['db_database']}";
        $dbManager = new DBManager(
            $db_dsn, $GLOBALS['db_username'], $GLOBALS['db_password']);
        $dbManager->open();
        $dbManager->test('test string');
        $res = $dbManager->execute(
            'SELECT COUNT(*)'.
            'FROM information_schema.tables'.
            'WHERE table_schema = '.$GLOBALS['db_database'].' '.
            'AND table_name = \'test\''
        );
        $this->assertEqual($res, 1);
    }
}

class TestOfTestWebDisplayWebTests extends WebTestCase {
    function testPageExists() {
        $this->get('http://localhost/bit562/php/dbtest.php');
        $this->assertResponse(200);
    }
}


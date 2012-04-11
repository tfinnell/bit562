<?php

require_once(dirname(__FILE__).'/simpletest/autorun.php');
require_once(dirname(__FILE__).'/simpletest/mock_objects.php');
require_once(dirname(__FILE__).'/simpletest/web_tester.php');
require_once(dirname(__FILE__).'/../php/baseDataPipe.php');
require_once(dirname(__FILE__).'/../php/CodeSnippetsDataPipe.php');
require_once(dirname(__FILE__).'/../php/tableMapManager.php');
require_once(dirname(__FILE__).'/../php/tableMap.php');
require_once(dirname(__FILE__).'/../php/DBManager.php');

Mock::generate('tableMap');
Mock::Generate('DBManager');

class TestsForCodeSnippets extends UnitTestCase {
    function testCodeSnippetsFilesExist() {
        $dp_exists = file_exists(dirname(__FILE__).
            '/../php/CodeSnippetsDataPipe.php');
        $this->assertTrue($dp_exists, "CodeSnippets Datapipe File Exists");
        $form_exists = file_exists(dirname(__FILE__).
            '/../forms/codesnippets.php');
        $this->assertTrue($form_exists, "Codesnippets Form Exists");
        $js_exists = file_exists(dirname(__FILE__).
            '/../controls/codesnippetsControl.js');
        $this->assertTrue($js_exists, "Codesnippets Controller exists");
    }

    function testCodeSnippetsObject() {
        $_REQUEST = array(
            'tableName' => 'codeSnippets',
            'tableMap'  => 'codeSnippets',
            'pipe'      => 'codesnippets'
        );
        $db_dsn = "mysql:host={$db_host};".
            "dbname={$db_database}";
        include(dirname(__FILE__).'/../php/db_login.php');
        $db = new DBManager(
            $db_dsn, $db_username, $db_password);
        $db->open();
        $tm = new TableMapManager($db);
        $snippetsDP = new CodeSnippetsDataPipe($tm, $db);
    }
}

class TestForCodeSnippetsPage extends WebTestCase {
#    function testPage() {
#        $this->get('http://localhost/bit562/forms/codesnippets.html');
#        $this->assertResponse(200);
#    }
}

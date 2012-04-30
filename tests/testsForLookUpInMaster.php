<?php

require_once(dirname(__FILE__).'/simpletest/autorun.php');
require_once(dirname(__FILE__).'/../php/DBManager.php');
require_once(dirname(__FILE__).'/../php/tableMapManager.php');
require_once(dirname(__FILE__).'/../php/tableMap.php');
require_once(dirname(__FILE__).'/../php/baseDataPipe.php');

class LookUpInMasterTester extends UnitTestCase {
    function testLookUpTableName() {
        $_REQUEST = array(
            'tableName' => 'users',
            'tableMap'  => '',
            'queryType' => 'select'
        );
        require(dirname(__FILE__).'/../php/db_login.php');
        $dsn = "mysql:host={$db_host};dbname={$db_database}";
        $dbMgr = new DBManager($dsn, $db_username, $db_password);
        $dbMgr->open();
        $mapMgr = new TableMapManager($dbMgr);
        $dp = new BaseDataPipe($mapMgr, $dbMgr);
        $this->assertEqual('codeSnippets',
            $dp->lookUpInMaster('fnovc-zuorr-zkfnv-eloim'));
        $this->assertFalse($dp->lookUpInMaster('zzzz-zzzz-zzzz-zzzz'));
    }
}

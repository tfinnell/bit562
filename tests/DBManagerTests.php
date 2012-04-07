<?php
//* This file is for Units Tests of the DBManager class.

if(!class_exists('UnitTestCase')) include('simpletest/autorun.php');
if(!class_exists('DBManager')) include('../php/DBManager.php');

class DBManagerTests extends UnitTestCase {
    
    
    
    public function testGetDBTestsWithEmptyDSN() {
        $DBManager = new DBManager("", "user", "pass");
        $getTestsResult = $DBManager->getDBTests();
        $this->assertNull($getTestsResult, "This should be null because the DBManager has not opened its connection yet.");
    }
    
    public function testGetDBTestsWithProperDSN() {
        $DBManager = new DBManager("mysql:host={$db_host};dbname={$db_database}", "user", "pass");
        $getTestsResult = $DBManager->getDBTests();
        $this->assertTrue(is_array($getTestsResult), "The response should be an array.");
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
}





?>
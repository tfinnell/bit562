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
    
    public function testScrub() {
        // DBManager constructor arguments don't matter for this test 
        $DBManager = new DBManager("", "user", "pass");
        $scrubbed = $DBManager->scrub("'");
        $this->assertEquals($scrubbed, "%pos;", "Should scrub a lone apostrophe into %pos;");
        $scrubbed = $DBManager->scrub("");
        $this->assertEquals($scrubbed, "", "An empty input should return an empty output"); 
    }
    
    public function testDeScrub() {
        $DBManager = new DBManager("", "user", "pass");
        $deScrubbed = $DBManager->deScrub("%pos;");
        $this->assertEquals($deScrubbed, "'", "Should scrub a lone %pos; into '");
        $deScrubbed = $DBManager->deScrub("");
        $this->assertEquals($deScrubbed, "", "An empty input should return an empty output"); 
    }
    
    public function testAssertToggle() {
        $DBManager = new DBManager("", "user", "pass");
        
        
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
}





?>
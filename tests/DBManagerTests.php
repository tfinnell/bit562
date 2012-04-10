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
        $DBManager = new DBManager("mysql:host={$GLOBALS['db_host']};dbname={$GLOBALS['db_database']}", $GLOBALS['db_username'], $GLOBALS['db_password']);
        $getTestsResult = $DBManager->getDBTests();
        $this->assertTrue(is_array($getTestsResult), "The response should be an array.");
        
    }
    
    public function testScrub() {
        // DBManager constructor arguments don't matter for this test 
        $DBManager = new DBManager("", "user", "pass");
        $scrubbed = $DBManager->scrub("'");
        $this->assertEqual($scrubbed, "%pos;", "Should scrub a lone apostrophe into %pos;");
        $scrubbed = $DBManager->scrub("");
        $this->assertEqual($scrubbed, "", "An empty input should return an empty output"); 
    }
    
    public function testDeScrub() {
        $DBManager = new DBManager("", "user", "pass");
        $deScrubbed = $DBManager->deScrub("%pos;");
        $this->assertEqual($deScrubbed, "'", "Should scrub a lone %pos; into '");
        $deScrubbed = $DBManager->deScrub("");
        $this->assertEqual($deScrubbed, "", "An empty input should return an empty output"); 
    }
    
    
    //I realized assertOn and positiveTest are private, so these two test methods are meaningless right now.
    /*public function testAssertToggle() {
        $DBManager = new DBManager("", "user", "pass");
        $DBManager->assertToggle();
        $this->assertTrue($DBManager->assertOn, "This should be true since the variable declaration starts out false.");
        $DBManager->assertToggle();
        $this->assertFalse($DBManager->assertOn, "This is verifying that the toggle works both ways, assuming the previous test passed.");
    }
    
    public function testPositiveTestToggle() {
        $DBManager = new DBManager("", "user", "pass");
        $DBManager->positiveTestToggle();
        $this->assertFalse($DBManager->positiveTest, "This should be true since the variable declaration starts out True.");
        $DBManager->positiveTestToggle();
        $this->assertTrue($DBManager->positiveTest, "This is verifying that the toggle works both ways, assuming the previous test passed.");
    }*/
    
    public function testConstructor() {
        // I wrote these first three tests before I remembered the properties are private and there are no accessor methods.
        /*$DBManager = new DBManager("arbitrary string", "user", "pass");
        $this->assertEquals($DBManager->db_dsn, "arbitrary string", "The dsn should be properly set using arbitrary strings.  If any validation is placed on the input of the dsn, then this test must be modified accordingly.");
        $this->assertEquals($DBManager->db_username, "user", "The user name should be properly set using arbitrary strings");
        $this->assertEquals($DBManager->db_password, "pass", "The pass should be properly set using arbitrary strings");*/
        
        // The DBManager does not have any type of data validation on the constructor.
        //  It is currently uncertain what should happen on improper input.  The subsequent tests assume the constructor would fail and return null.
        $arbitraryObject = new stdClass();
        $DBManager = new DBManager($arbitraryObject, "user", "pass");
        $this->assertNull($DBManager, "An object instead of a string was passed to the db_dsn property which should result in a null object");
        $DBManager = new DBManager("arbitrary string", $arbitraryObject, "pass");
        $this->assertNull($DBManager, "An object instead of a string was passed to the db_username property which should result in a null object");
        $DBManager = new DBManager("arbitrary string", "user", $arbitraryObject);
        $this->assertNull($DBManager, "An object instead of a string was passed to the db_password property which should result in a null object");
        
        
    }
    
    
    
    
    
    
    
    
}





?>
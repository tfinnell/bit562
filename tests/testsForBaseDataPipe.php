<?php

require_once('simpletest/autorun.php');
require_once('../php/baseDataPipe.php');

class BaseDataPipeTester extends UnitTestCase {

    function testForExistenceOfBasesDataPipe() {
        $this->assertTrue(file_exists('../php/baseDataPipe.php'));
    }

}

?>

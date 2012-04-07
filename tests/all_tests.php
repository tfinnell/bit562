<?php

require_once(dirname(__FILE__).'/simpletest/autorun.php');

class AllTests extends TestSuite {
    function AllTests() {
        $this->TestSuite('All tests');
        $this->addFile('testsForSourceLineObject.php');
        $this->addFile('testsForBaseDataPipe.php');
        $this->addFile('testsForDatabase.php');
    }
}

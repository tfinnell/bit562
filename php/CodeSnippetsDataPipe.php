<?php

/**********************************************************
 *  Post for this data pipe with:
 *     {
 *          "pipe" : "projectfiles",
 *          "queryType" : "select",
 *          "tableName" : "projectfiles",
 *          "project" : "BIT561"
 *      }
 **********************************************************/
class CodeSnippetsDataPipe extends baseDataPipe {

    protected $snippet;

    function __construct($tableMapManager, $dataManager) {
        parent::__construct($tableMapManager, $dataManager);
        $this->snippet = $_REQUEST['codeSnippets'];
    }

    function where() {
        return "WHERE code LIKE '%'";
    }

}

<?php
session_start();

if ($_SESSION['loggedIn'] != true)
  header('location:../forms/login.php');

?>

<html>
  <head>
    <title>Code Snippets</title>

      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>

      <link rel="stylesheet" href="../css/bit561.css" type="text/css" />
  </head>
  <body>

    <div id="leftside">
      <img src="../images/leftside.jpg" width="125" height="1275"></img>
    </div>

    <div id="rightside">
      <img src="../images/rightside.jpg" width="125" height="1275"></img>
    </div>

    <div id="topside">
      <h2 align="center" id="pagetitle">Project Files</h2>
    </div>

    <div id="helpComments">
    </div>

    <div id="bgframe">
      <div id="instructions">
      </div>

      <div id="main">

        <h3>BIT561 -- Cascadia Professional Studies</h3>

        <hr color="black" width="670px" />

        <table>
          <tr>
            <td width="150" valign="center">
              <font size="+1" style="bold">
                <strong id="formTitle">Code Snippets</strong>
              </font>
            </td>
            <td width="450" align="right" class="controlColor">
              <strong>Select Language:&nbsp;&nbsp;</strong>
              <select id="selectFileCategory" class="formdata category">
                <option value="No Category Selected">
                  No Category Selected
                </option>
              </select>
            </td>
          </tr>
        </table><br />

        <form id="filecontrol" class="dataControl">
          <select class="wideSelect" id="fileselect">
          </select><br /><br />
          <img src="../images/prevArrow.jpg"
            title="Look at the previous file in the dropdown list." />
          <img src="../images/SaveData.jpg"
            title="Save the current file information." />
          <img src="../images/NewData.jpg"
            title="Blank the form to create a new file." />
          <img src="../images/DeleteData.jpg"
            title="Remove the current file from the database." />
          <img src="../images/ExitData.jpg" title="Exit the file form." />
          <img src="../images/nextArrow.jpg"
            title="Look at the next file in the dropdown list." />
          <input type="hidden" class="formdata dirtyFlag" value="false">
          </input>
        </form>

        <form name="codeSnippets" id="codeSnippets">
          <fieldset id="name" class="required">
            <table border="0" cellspacing="9" cellpadding="0">
              <tr>
                <td colspan="2" class="fields">Snippet Name
                  <span class="asterisk">&nbsp;*</span>
                </td>
              </tr>
              <tr>
                <td>
                  <input type="text" class="formdata name" size="84"
                    value="" />
                </td>
              </tr>
                <tr>
                  <td class="undertitle">Name your snippet</td>
                </tr>
            </table>
          </fieldset>
          <fieldset id="code" class="required">
            <table border="0" cellspacing="9" cellpadding="0">
              <tr>
                <td colspan="2" class="fields">Code
                  <span class="asterisk">&nbsp;*</span>
                </td>
              </tr>
                <tr>
                  <td>
                    <input type="text" class="formdata code"
                      size="84" value="" />
                  </td>
                </tr>
                <tr>
                  <td class="undertitle">paste your snippet up in here</td>
                </tr>
            </table>
          </fieldset>
          <fieldset id="FK_language" class="required">
            <table border="0" cellspacing="9" cellpadding="0">
              <tr>
                <td colspan="2" class="fields">Language
                  <span class="asterisk">&nbsp;*</span></td>
              </tr>
              <tr>
                <td>
                  <input type="text" class="formdata FK_language" size="84"
                    value="" />
                </td>
              </tr>
            </table>
        </fieldset>
        <fieldset id="description" class="required">
          <table border="0" cellspacing="9" cellpadding="0">
            <tr>
              <td colspan="2" class="fields">Snippet Description</td>
            </tr>
            <tr>
              <td>
                <textarea type="text" class="formdata description"
                  rows="9" cols="63" value="" >
                </textarea>
              </td>
            </tr>
          </table>
        </fieldset>

        <input type="hidden" class="formdata object_ID" value=""></input>
        <input type="hidden" class="formdata authoroid" value=""></input>

       </form>
      </div>
    </div>

    <script src="../tools/request.js" type="text/javascript"></script>
    <script src="../tools/utilities.js" type="text/javascript"></script>
    <script src="../javascript/tools/getElements/getElements.js"
      type="text/javascript"></script>
    <script src="../base/structure.js" type="text/javascript"></script>
    <script src="../base/carousel.js" type="text/javascript"></script>
    <script src="../base/formhandler.js" type="text/javascript"></script>
    <script src="../base/view.js" type="text/javascript"></script>
    <script src="../controls/codesnippetsControl.js"
      type="text/javascript"></script>

    <script>

      $PF.setUpProjectFiles();

    </script>
  </body>
</html>
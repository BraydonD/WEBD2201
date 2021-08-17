<?php
$file = "lab2.php";
$date = "28 May 2021";
$title = "Braydon's Website";
$desc = "Webpage for Lab 2";
$banner = "Braydon's Website - Lab 2";
include ("./header.php");
?>
        <h1 style="text-align: center;">Lab 2 Working With Tables</h1>
          <p style="font-size: larger; text-align: center;">
            <b>This webpage will be used demenstarte the use of tables all all the tags that go along with it.
              The first table will show all the table tags to use. The second table will be a table listing movies when they came out
              and a description of them. The last table will be a timetable for a student at Durham College.</b>
        </p><hr/>
          <table border="1" cellspacing="0" style="width: 300px; margin-left: auto; margin-right: auto;">
            <caption>HTML Table Tags</caption>
            <thead>
              <tr>
                <th>Tag</th>
                <th>Description</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>&lt;table&gt;</td>
                <td valign="top">Denotes the start of an HTML table in a web page.</td>
              </tr>
              <tr>
                <td>&lt;tr&gt;</td>
                <td>Denotes the start of a row in an HTML table (Note: these tags must exist inside &lt;table&gt;...&lt;/table&gt; tags in order to be valid, and work correctly.</td>
              </tr>
              <tr>
                <td>&lt;td&gt;</td>
                <td>Denotes a cell (or Table Data) in an HTML table (NOTE: these tags must exist inside &lt;tr&gt;...&lt;/tr&gt; tags in order to be valid, and work correctly.</td>
              </tr>
              <tr>
                <td>&lt;th&gt;</td>
                <td>Very similar to the &lt;td&gt; tags described above but the text is bold and centered.</td>
              </tr>
              <tr>
                <td>&lt;caption&gt;</td>
                <td>Will place a caption on an HTML table (NOTE: this tag must be implemented right after the opening &lt;table&gt; tag in order to be valid and work correctly).</td>
              </tr>
              <tr>
                <td></td>
                <td></td>
              </tr>
            </tbody>
            </table>
          <hr/>
          <table border="1" cellspacing="0" style="width: 600px; margin-left: auto; margin-right: auto;">
            <thead>
              <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Year of Publication</th>
                <th>Description</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Shrek</td>
                <td>Dreamworks Animation</td>
                <td>2001</td>
                <td>An ogre meets a donkey and they save a princess.</td>
              </tr>
              <tr>
                <td>Shrek 2</td>
                <td>Dreamworks Animation</td>
                <td>2004</td>
                <td>An ogre goes to his mother in law's where things don't go his way.</td>
              </tr>
              <tr>
                <td>Shrek 3</td>
                <td>Dreamworks Animation</td>
                <td>2007</td>
                <td>An ogre's father in law becomes sick and he is now king.</td>
              </tr>
            </tbody>
            </table>
            <hr/>
            <table border="1" cellspacing="0" style="width: 650px; margin-left: auto; margin-right: auto;">
              <thead>
                <tr>
                  <th></th>
                  <th>Monday</th>
                  <th>Tuesday</th>
                  <th>Wednesday</th>
                  <th>Thursday</th>
                  <th>Friday</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>8:10am-<br/>9:00am</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>9:10am-<br/>10:00am</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>10:10am-<br/>11:00pm</td>
                  <td></td>
                  <td></td>
                  <td rowspan="2" style="background-color:lightgray;">WEBD2201<br/>CRN: 35042<br/>SW213</td>
                  <td></td>
                  <td rowspan="2" style="background-color:lightgray;">WEBD4201<br/>CRN: 35045<br/>SW214</td>
                </tr>
                <tr>
                  <td>11:10am-<br/>12:00pm</td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>12:10pm-<br/>1:00pm</td>
                  <td></td>
                  <td></td>
                  <td rowspan="2" style="background-color:lightgray;">WEBD4201<br/>CRN:34045<br/>SW214</td>
                  <td colspan="2" style="background-color: greenyellow; text-align: center;">LUNCH</td>
                </tr>
                <tr>
                  <td>1:10pm-<br/>2:00pm</td>
                  <td></td>
                  <td></td>
                  <td rowspan="2" style="background-color:lightgray;">CSYS2122<br/>CRN:32434<br/>SW201</td>
                  <td rowspan="2" style="background-color:lightgray;">WEBD2201<br/>CRN: 35042<br/>C110</td>
                </tr>
                <tr>
                  <td>2:10pm-<br/>3:00pm</td>
                  <td></td>
                  <td colspan="2" style="background-color: greenyellow; text-align: center;">LUNCH</td>
                </tr>
                <tr>
                  <td>3:10pm-<br/>4:00pm</td>
                  <td></td>
                  <td></td>
                  <td rowspan="2" style="background-color:lightgray;">WEBD2201<br/>CRN: 32646<br/>SW214</td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>4:10pm-<br/>5:00pm</td>
                  <td></td>
                  <td rowspan="2" style="background-color:lightgray;">CSYS2122<br/>CRN: 32434<br/>SW214</td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>5:10pm-<br/>6:00pm</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </table>
<?php
include ("./footer.php");
?>
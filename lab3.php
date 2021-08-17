<?php
$file = "lab3.php";
$date = "3 June 2021";
$title = "Braydon's Website";
$desc = "Lab 3";
$banner = "Braydon's Website - Lab 3";
include ("./header.php");
?>
          <h1>Lab 3: Formatting and Layout with Styles</h1>
            <p>
                <b> This webpage will demonstrate how CSS works and how it has been
                implemented into this website!
                </b>
            </p>
            <hr/>
            <p>The first element that I changed was &lt;body&gt;
                This includes the background-color and the font family
                for a more redable experiance. This can be seen on all webpages! <br/><br/>
                background-color:#ebffff;<br/>
                font-family: Helvetica, Arial, sans-serif;<br/>
                text-align: center;
            </p>
            <hr/>
            <p>
                The &lt;th&gt; tags font has been changed to be more redable and the
                font weight has been set bolder as seen below!<br/><br/>
                font-family: Verdana;<br/>
                font-weight: bolder;<br/>
                border: 1px solid; 
            </p>
                  <table border="2" style="margin-left: auto; margin-right: auto;">
                    <tr>
                      <th>
                        This is an example of the &lt;th&gt; tag!
                      </th>
                    </tr>
                  </table>
            <hr/>
            <p>
              The &lt;a&gt; has had all the colors changed depending on the state
              that it is in as seen below!<br/><br/>
              a:link color: rgb(135, 185, 243);<br/>
              a:visted color: cornflowerblue;<br/>
              a:hover color: lightslategrey; <br/>
              a:active color: mediumorchid;<br/>
            </p>
            <a style="text-align: center;" href="../lab3/lab3.html">Lab 3 - Formatting &#38; Layout</a>
            <hr/>
            <p>
              The &lt;h1&gt; has had it's font changed and set to a bolder font weight.
              as seen in the title of this webpage!<br/><br/>
              font-family: Verdana,Tahoma, sans-serif;<br/>
              font-weight: bolder;<br/><br/>
            </p>
            <h1>This is an example of the &lt;h1&gt; tag!</h1>
            <hr/>
            <p>
              The &lt;table&gt; has had the border set to 1 px and the font color changed
              as seen on this webpage!<br/><br/>
              border: 1px solid salmon;<br/>
              color: darksalmon;<br/><br/>
            </p>
            <table style="margin-left: auto; margin-right: auto;">
                <tr>
                  <th>This is an example</th>
                  <th>of the &lt;table&gt; tag!</th>
                </tr>
              </table>
            <hr/>
            <p>
              The &lt;h&gt; tag has been set to display as a dotted patern instead of the solid line as seen below!<br/><br/>
              border: 1px dotted salmon;<br/>
            </p>
            <hr/>
            <br/>
            <hr/>
            <p>
              The &lt;ol&gt; tag has been changed to show a list starting with 01. instead of just 1. example below!<br/><br/>
              <br/>
              list-style-type: decimal-leading-zero;<br/>
            </p>
            <ol>
              <li>
                Number 01 
              </li>
              <li>
                Number 02
              </li>
            </ol>
            <hr/>
            <p>
              The &lt;sup&gt; and &lt;sub&gt; tags have been changed to make them smaller text example below!<br/><br/>
              &lt;sup&gt;<br/>
              vertical-align: sup;<br/>
              font-size: x-small;<br/>
              &lt;sub&gt;<br/>
              vertical-align: sub;<br/>
              font-size: x-small;<br/><br/>
              Example of <sup> &lt;sup&gt;</sup><br/> 
              Example of <sub> &lt;sub&gt;</sub><br/>
            </p>
            <hr/>
            <p>
              The &lt;i&gt; has had it's font changed to make it look more distiguised example below!<br/><br/>
              font-style: italic;<br/>
              font-family:'Arial Narrow Bold';<br/><br/>
              <i>This is an example of the &lt;i&gt; tag!</i>
            </p>
            <hr/>
            <p>
            The last tag that was changed was the &lt;p&gt; tag to increase the size of the font! <br/><br/>
            font-size: larger;<br/><br/>
            This is an example of the &lt;p&gt; tag!
            </p>

<?php
include ("./footer.php");
?>
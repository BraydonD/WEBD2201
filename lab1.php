<?php
$file = "lab1.php";
$date = "21 May 2021";
$title = "Braydon's Website";
$desc = "Web page for lab 1";
$banner = "Braydon's Website - Lab 1";
include ("./header.php");
?>
            <h1 style="text-align: center;">Lab 1: XHTML Basics Including Special Characters</h1><br/>
            <p>
              This webpage will deminstate how diffrent tags are used. I will also show how ordered list and un-ordered list are created.
            </p><hr/>
            <h3>Einstein's Relativity</h3>
            <p>
              For Einstein's Relativity formula you have to use superscript (&lt;sup&gt; ... &lt;/sup&gt;) 
              and (&lt;i&gt; ... &lt;/i&gt;) tags. It is wrapped in heading 2 (&lt;h2&gt; ... &lt;/h2&gt;) 
              tags to make it larger and bolder. <b>NOTE: be careful with proper nesting to ensure the the 
              page passes the XHTML validator. This line is bolded using the (&lt;b&gt; ... &lt;/b&gt;) tags.</b><br/>
            </p>        
              <h2><b><i> E = mc <sup>2</sup></i></b></h2><hr/>
              <h3>Currency Conversion(use of special characters)</h3>
            <p>
              To do diffrent currency symbols in plain text I will use "&amp;pound&#59;" for the &pound; symbol, "&amp;euro&#59;" for the &euro; symbol, and "&amp;yen&#59;" for the &yen; symbol.<br/>
            </p>
              <h2><b>$1.00 CDN = $0.703USD = &pound;0.487 = &euro;0.651 = &yen;82.77</b></h2><hr/>  
              <h3>Chemistry Equation</h3>
            <p> 
              To write this equation we need to use the &lt;sub&gt; tag.
            </p>
              <h2><b>2H<sub>2</sub> + O => 2h<sub>2</sub>O + heat</b></h2><hr/>
              <h3>List Example (order important)</h3>
            <p>
              To make a ordered list we will use the &lt;ol&gt; tag to start the list and the &lt;li&gt; tag to add itemts to the list.
            </p>
            <h2>How to start a car</h2>   
              <ol>
                <li>Place key in ignition</li>
                <li>Depress the break pedal</li>
                <li>Turn the ignition key</li>
              </ol><hr/>
            <h3>List Example order unimportant</h3>
            <h2>Things to do before my trip</h2>
            <p>
                To creat an unordered list we use the &lt;ul&gt; tag to start the list and the &lt;li&gt; tag to add to the list.
            </p>
              <ul>
                <li>Re-new passport</li>
                <li>Convert currency</li>
                <li>Print out reservations &amp; itineraries</li>
                <li>Verify vaccinations are up-to-date</li>
              </ul><hr/>
<?php
include ("./footer.php");
?>
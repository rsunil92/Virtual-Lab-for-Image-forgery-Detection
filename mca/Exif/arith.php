<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
 <script type="text/javascript" src="exif.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- This file was originally generated at http://psd2cssonline.com on September 16, 2010, 10:04 am -->
<!-- psd2css Online version 1.85 -->

<title>Virtual Lab</title>

<!-- Some META tags to help with Search Engine Optimization.  Please 
note however that META tags are NOT a magic bullet to get your web page
to the top of search engine rankings.  They are just part of that effort.  You 
can get more information by googling SEO or visiting the psd2css Online forums. -->
<meta name="description" content="Put the description of this page here" />
<meta name="keywords" content="Put keywords for this page here separated by commas" />
<meta name="generator" content="psd2css Online - Dynamic Web Pages from your Photoshop Design in seconds" />

<!-- The CSS Reset from Eric Meyers -->
<!-- <link rel="stylesheet" type="text/css" href="cssreset.css" media="screen" /> -->

<!-- The Primary External CSS style sheet. -->
<link rel="stylesheet" type="text/css" href="css/psd2css.css" media="screen" />

<!-- We use the jquery javascript library for DOM manipulation and
some javascript tricks.  We serve the script from Google because its
faster than most ISPs.  Get more information and documentation
at http://jquery.com 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script> 
-->
<script type="text/javascript" src="js/jquery-1.4.2.min.js"> </script>
<!-- All the javascript generated for your design is in this file -->
<script type="text/javascript" src="js/psd2css.js"></script>

<!-- For Jquery UI-->
<script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/dark-hive/jquery-ui-1.8.4.custom.css">

<!-- For Slider - http://carpe.ambiprospect.com/slider/-->
<link type="text/css" rel="StyleSheet" href="css/carpe-slider.css" />
<script type="text/javascript" src="js/carpe-slider.js"></script>

<!--http://www.cssmenumaker.com/builder/menu_info.php?menu=057-->
<link type="text/css" rel="StyleSheet" href="menu/menu_style.css" />

<!--for ImgSelect - http://odyniec.net/projects/imgareaselect/-->
<link rel="stylesheet" type="text/css" href="css/imgareaselect-default.css" />  
<script type="text/javascript" src="js/jquery.imgareaselect.js"></script> 

<!--for Flot -->
<script type="text/javascript" src="js/jquery.flot.js"></script> 

<!--for COntent Slider - Jquery Slider/-->
 <link rel="stylesheet" type="text/css" href="css/jquery-slider.css">



<script type="text/javascript">

function blinker(i){
if(buttId!="cancel" && i>0) {
$($(buttId),"#Layer-2").toggleClass("ui-state-hover");
setTimeout("blinker("+(i-1)+")",500);
}
}

function set_state(state) {
switch (state) {
case 0: $("#nextBox").html("Start the Experiment by clicking on 'Select Image' and selecting an Input Image from the Mosaic");
buttId="button1"; 
blinker(10);
break;
case 1: $("#nextBox").html("Select the secondary image, select appropriate parameters and click on 'Run'.");
buttId="button2";
blinker(10);
break;
case 2: $("#nextBox").html("Observe the result and try different operations with different secondary Images.");
break;
}
jstate=state;
}


  function toggleMosaic()    {
  var ias = $('#Mosaic').imgAreaSelect({ instance: true });
      if($("#Mosaic").is(":visible")) {
        ias.setOptions({ hide: true });
        $("#Mosaic").hide("slow");
      } else {
        $("#Mosaic").show("slow", function() {
          ias.setOptions({ show: true });
          ias.update();
        });
      }
  }
</script>

<script tyre="text/javascript">

function set_crop() {
set_state(1);
	
    var ias = $('#Mosaic').imgAreaSelect({ instance: true });
	var sel=ias.getSelection();

    //alert('sdfsd');

    var aurl='x=' + sel.x1 + '&y=' + sel.y1 + '&w=' + sel.width + '&h=' + sel.height;


    $.ajax({url: "crop.php" , type: "POST", data: aurl, async: false, dataType: "html", success: function(data) {
		$("#Layer-4").html(data);		
	       
	     }});
}
</script>


<script type="text/javascript">
function doTransform(){

    	if(jstate == 0) {
	    alert("First click on Mosaic and select the Input Image.");
            return;
    	}

	var args;
	
	var checkBoxes = $("input[name=Operatn]");

	$.each(checkBoxes, function() {
                if ($(this).attr('checked')){
           	args = $(this).attr('value');
        	}	
        });

	checkBoxes= $("input[name=fitting]");

	$.each(checkBoxes, function() {
                if ($(this).attr('checked')){
           	args = args + "&fitting=" + $(this).attr('value');
        	}	
        });
	
	checkBoxes = $("input[name=inpImage]");

	$.each(checkBoxes, function() {
                if ($(this).attr('checked')){
           	args = args + "&image=" + $(this).attr('value');
        	}	
        });


	if(!($('#Mosaic').is(":visible"))) {
	var aurl = "trns.php?opn=arith&opt=" + args;

set_state(2);

       $("#slider").remove();	
       $.ajax({ url: aurl, type: "GET", async: false, dataType: "html", success: function(data){
		$(".content-conveyor", $("#sliderContent")).html(data);	
	}});
	$("#sliderContent").append('<div id="slider"></div>');
    
	var conveyor2 = $(".content-conveyor", $("#sliderContent")),
	item2 = $(".item", $("#sliderContent"));
	
	//set length of conveyor
	conveyor2.css("width", item2.length * parseInt(item2.css("width")));
        conveyor2.css("left","-" + ((item2.length * parseInt(item2.css("width"))) - parseInt($(".viewer", $("#sliderContent")).css("width"))) + "px");
			
	//config
	var sliderOpts = {
	  max: (item2.length * parseInt(item2.css("width"))) - parseInt($(".viewer", $("#sliderContent")).css("width")),
	  value:  (item2.length * parseInt(item2.css("width"))) - parseInt($(".viewer", $("#sliderContent")).css("width")),
	  slide: function(e, ui) { 
		conveyor2.css("left", "-" + ui.value + "px");
	  }
	};
	
	//create slider
	$("#slider").slider(sliderOpts);

        $("img",$("#Layer-5")).attr("src",$("img",$(".item:last")).attr("src")); 
  
       
       }

var myImage = new Image();
myImage.name = $("img",$("#Layer-5")).attr("name");
myImage.src = $("img",$("#Layer-5")).attr("src");
myImage.onload = function () {
  $("dims","#imgInfo").html(this.height + " x " + this.width);
}}

 
function confirmTo(url) {
	var response = confirm('You will lose Session Data: Continue?');
	if(response) {
		window.location.href=url;
	}
}
 

  $(document).ready (function() {
    set_state(0);  $(".imageFull").hide();
  $("#popUp").hide();
  $("#radio").buttonset();
  $("#radio").button("refresh");
   $("button1","#Layer-2").button();
  $("button1","#Layer-2").click( function() {
  toggleMosaic();
  });



  $("button2","#Layer-2").button();
  $("#radio").buttonset();
  $("#radio").button("refresh");
 
  $("button4","#Layer-2").button();
  $("button4","#Layer-2").click ( function () {
  
    set_state(0);  $("dims","#imgInfo").html("____ x ____ ");
  
  $("img",$("#Layer-5")).attr("src","images/Layer-5.jpg");  
  $("img",$("#Layer-4")).attr("src","images/Layer-4.jpg")
$("#sliderContent").replaceWith('      <div id="sliderContent" class="ui-corner-all">		<div class="viewer ui-corner-all">	  <div class="content-conveyor ui-helper-clearfix">	    <div class="item">	      <h2>Start</h2>	      <img src="images/Mosaic.png" alt="picture" width="140px" height="140px"/>	      <dl class="details ui-helper-clearfix">		<dt>Select a portion of the Mosaic on the Right and Transform... </dt>	      </dl>	    </div>	  </div>	</div>	<div id="slider"></div>      </div>');
});
 
  $("button2","#Layer-2").click ( function () {
  doTransform();
  });
  
  $("#Mosaic").imgAreaSelect({ 
  handles: true, 
  movable: true,
  persistent: true,
  resizable: false,
  x1: 300, y1: 300, x2: 600, y2: 600,
  hide: false,
  imageHeight: 900,
  imageWidth: 900,
  });
  toggleMosaic();
  
  				
				
});



</script>
</head>

<script>
document.getElementById("file-input").onchange = function(e) {
    EXIF.getData(e.target.files[0], function() {
        alert(EXIF.pretty(this));
    });
}
</script>

<body>

  <!-- This is 'Backgound_bkgnd_center_jpg' -->
<div id="Layer-1" class="Backgound_bkgnd_center_jpg"  >
    

    <!-- This is 'TopBar_jpg' -->
    <div id="Layer-3" class="TopBar_jpg"  >
      <img src="images/Layer-3.jpg" width="894" height="96" alt="TopBar" />
      <!-- This is 'IIIT' -->
      <div id="Layer-6" class="IIIT"  >
        <img src="images/iiit.png" width="100" height="70" alt="IIIT" class="pngimg" />
	</div>
	
			<div id="topMenu">
			<h1 style="text-align: center;">Virtual Lab for Image Forgery Detection</h1>
<div class="home">
<a onclick="../Vlab/List of experiments.html">home</a>
</div>
			<div class="menu">
<ul>
<li><a href="objective.php" target="_self" >Objective</a>
</li>
<li><a href="intro.php" target="_self" >Introduction</a>
</li>
<li><a href="theory.php" target="_self" >Theory</a>
</li>
<li><a href="procedure.php" target="_self" >Procedure</a>
</li>
<li><sel><a href="arith.php" target="_self" >Experiment</a>
</sel></li>
<li><a href="#" target="_self" >Assessment</a>
				<ul>
					<li><a href="quiz.php">Quiz</a></li>
					<li><a href="assign.php">Assignment</a></li>
			   </ul>
</li>
<!--
<li><a href="references.php" target="_self" >References</a>
</li>
-->
<li><a href="summary.php" target="_blank" >Summary</a>
</li>
</ul>
</div>
			</div>
			

    </div>

    <!-- This is 'Parameters_jpg' -->
  <div id="Layer-2">

	  <h2 style="text-align: center;">Image Exif MetaData </h2>
	  
	  Upload an image
	<form class="form1" action="" method="post" enctype="multipart/form-data">
		<input id="file-input" type="file" value="" size="50" name="f1" />
		<input type="submit" value="Upload" name="submit"/>
	</form>
	<br />
	File size limit: 1 mb
	<p>Valid file types: JPG/JPEG, TIFF</p> 


<script>
document.getElementById("file-input").onchange = function(e) {
    EXIF.getData(e.target.files[0], function() {
        alert(EXIF.pretty(this));
    });
}
</script>
<div id="layer-5"> </div>
<?php
mysql_connect("localhost","root","");
mysql_select_db("db");
if(isset($_POST["submit"]))
{
$image = addslashes(file_get_contents($_FILES['f1']['tmp_name']));
mysql_query("insert into img values('','$image')");
}
?>
</div>
    <div id="Layer-4">
      <h3 style="text-align: center;">Uploaded Image</h3> 
  <div id="layer-"> </div>
	  
<?php
if(isset($_POST["submit"]))
{
   $res=mysql_query("select image1 from img where id = (select max(id) from img)");
   echo "<table>";
   echo "<tr>";
   
   while($row=mysql_fetch_array($res))
   {
   echo "<td>"; 
   echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image1']).'" height="200" width="270"/>';
   echo "<br>";
   echo "</td>";
   
   
   
   }
   echo "</tr>";
   
   echo "</table>";
  

}

?>
    </div>
</div>
</body>
</html>



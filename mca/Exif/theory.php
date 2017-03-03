
<head>
<!-- The Primary External CSS style sheet. -->
<link rel="stylesheet" type="text/css" href="css/psd2css.css" media="screen" />

<!-- We use the jquery javascript library for DOM manipulation and
some javascript tricks.  We serve the script from Google because it's
faster than most ISPs.  Get more information and documentation
at http://jquery.com 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script> -->
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>

<!-- All the javascript generated for your design is in this file -->
<script type="text/javascript" src="js/psd2css.js"></script>

<!--http://www.cssmenumaker.com/builder/menu_info.php?menu=057-->
<link type="text/css" rel="StyleSheet" href="menu/menu_style.css" />
<title>Theory - Virtual Lab in Image Processing</title>

</head>


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
			<h1>VIRTUAL LAB in IMAGE PROCESSING</h1>
<div class="home">
<a href="index.html">home</a>
</div>

			<div class="menu">
<ul>
<li><a href="objective.php?exp=arith" target="_self" >Objective</a>
</li>
<li><a href="intro.php?exp=arith" target="_self" >Introduction</a>
</li>
<li><sel><a href="theory.php?exp=arith" target="_self" >Theory</a></sel>
</li>
<li><a href="procedure.php?exp=arith" target="_self" >Procedure</a>
</li>
<li><a href="arith.php" target="_self" >Experiment</a>
</li>
<li><a href="#" target="_self" >Assessment</a>
				<ul>
					<li><a href="quiz.php?exp=arith">Quiz</a></li>
					<li><a href="assign.php?exp=arith">Assignment</a></li>
			   </ul>

</li><li><a href="references.php?exp=arith" target="_self" >References</a>
</li>
</ul>
</div>
</div>
<div class="experiment" style="text-indent: 20px; background-color: #FFFFFF;
color: black;" >
<b> Image Arithmetic - Theory </b>
	<p>
	</p>
	<p>
	A (x,y) o B(x,y) = I(x,y)
	</p>
	<p>
	</p>
	<p>
	The important requirement in image arithmetic is that all (input and output) the images are of the same size MxM.
	</p>
	<p>
	</p>
	<p>
	Arithmetic operations are done pixelwise. Let p = A(x,y) and q = B(x,y) be the pixel values to be operated on and r =I(x,y) be the result of the
	operation.
	</p>
	<p>
	</p>
	<p>
	<b>Addition </b>
	:
	</p>
	<p>
	</p>
	<p>
	I(x,y) = A(x,y) + B(x,y) &rarr; r = p + q
	</p>
	<p>
	</p>
	<p>
	<b>Subtraction</b>
	:
	</p>
	<p>
	</p>
	<p>
	I(x,y) = A(x,y) - B(x,y) &rarr; r = p - q
	</p>
	<p>
	</p>
	<p lang="fr-FR">
	<b>Difference :</b>
	</p>
	<p>
	</p>
	<p>
	I(x,y) = |A(x,y) - B(x,y)| &rarr; r = |p - q|
	</p>
	<p>
	</p>
	<p>
	<b>Multiplication</b>
	:
	</p>
	<p>
	</p>
	<p>
	I(x,y) = A(x,y) X B(x,y) &rarr; r = p x q
	</p>
	<p>
	</p>
	<p>
	<b>Division </b>
	:
	</p>
	<p>
	</p>
	<p>
	I(x,y) = A(x,y) / B(x,y) &rarr; r = p / q
	</p>
	<p>
	</p>
	<p>
	<b>Implementation issues: </b>
	</p>
	<p>
	</p>
	<p>
	Digital images are stored as b - bit images. Hence, the range of values a pixel can take is restricted to the range [ 0, 1,... (2<sup>b </sup>-1)]. With
	b= 8 this range is [0,1,...255]. The closed interval poses a problem when performing arithmetic operations in practice, as the results are not
	guaranteed to be within this interval. For an 8-bit image the intervals for the output pixel for each operation are:
	</p>
	<p>
	</p>
	<p>
	Addition: r &#8712; [0, (2x255=510)]
	</p>
	<p>
	</p>
	<p>
	Subtraction: r &#8712; [-255, 255]
	</p>
	<p>
	</p>
	<p>
	Difference: r &#8712; [0, 255]
	</p>
	<p>
	</p>
	<p>
	Multiplication: r &#8712; [0, (255<sup>2</sup> = 65025)]
	</p>
	<p>
	</p>
	<p>
	Division: r &#8712; [0,&infin;]
	</p>
	<p>
	</p>
	<p>
	Since we need r to be in [0,255], we will have an underflow or overflow. A final processing step is generally required to handle this problem.
	</p>
	<p>
	</p>
	<p>
	There are two options:
	</p>
	<p>
	</p>
	<p>
	Clipping- Map all negative pixel values ( r &lt; 0) to zero and all values above 255 to 255.
	</p>
	<p>
	</p>
	<p>
	Auto scaling - This operation remaps the range of r to fit to be in [0, 255] as follows. Let r<sub>a</sub> be the autoscaled value.
	</p>
	<p>
	</p>
	<p>
	r<sub>a</sub> = 255 x (r - r<sub>min</sub>)/(r<sub>max</sub>-r<sub>min</sub>)
	</p>
	<p>
	</p>
	<p>
	Where, r<sub>max</sub> and r<sub>min</sub> are the maximum and minimum values of an arithmetic operation.
	</p>
	<p>
	</p>
</div>
</body>

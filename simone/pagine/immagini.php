
<html>
<h1 align="center">GALLERIA</h1>
</BR>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Step Carousel Demo</title>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>

<script type="text/javascript" src="js/stepcarousel.js">

/***********************************************
* Step Carousel Viewer script- (c) Dynamic Drive DHTML code library 
(www.dynamicdrive.com)
* Visit http://www.dynamicDrive.com for hundreds of DHTML scripts
* This notice must stay intact for legal use
***********************************************/

</script>

<script type="text/javascript">
stepcarousel.setup({
	galleryid: 'mygallery', 
	beltclass: 'belt', 
	panelclass: 'panel', 
	autostep: {enable:true, moveby:1, pause:3000},
	panelbehavior: {speed:500, wraparound:false, persist:true},
	defaultbuttons: {enable: true, moveby: 1, leftnav: 
['images/leftnav.gif', -5, 80], rightnav: 
['images/rightnav.gif', -20, 80]},
	statusvars: ['statusA', 'statusB', 'statusC'], 
	contenttype: ['inline'] 
})

</script>

<link href="style.css" rel="stylesheet" type="text/css" media="screen" />

</head>

<body>
<div id="mygallery" class="stepcarousel">

<ul class="belt">

<li class="panel">
<img src="images/imm1.gif" /><br />
Stanza 1
</li>

<li class="panel">
<img src="images/imm3.gif" /><br />
Stanza 2
</li>

<li class="panel">
<img src="images/imm4.gif" /><br />
Stanza 3
</li>

<li class="panel">
<img src="images/imm5.gif" /><br />
Stanza 4
</li>

<li class="panel">
<img src="images/imm1.gif" /><br />
Stanza 5
</li>

</ul>
</div>

<p align="center">
<b>Foto attuale:</b> <span id="statusA"></span>
 <b style="margin-left: 30px">Foto totali:</b> <span 
id="statusC"></span>
</p>

<p align="center" id="mygallery-paginate" ">
<img src="images/opencircle.png" data-over="images/graycircle.png" data-select="images/closedcircle.png" data-moveby="1" />
</p>

</body>
</html>
<?
include("include/session.php");
?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Meniu</title>
	
    <body>
<style>
<!------------------------------------------------->
	form {background-color:#F1FCA2;}
	body {background-color:#F1FCA2;}
<!------------------------------------------------->
</style>
<?
 
 

	echo "<img src=\"pictures/top.png\" /><br>";
	?>
	

	<h1> Karstieji patiekalai </h1>
	
   <div class="product1"> 1.</div>
        <div class="product1 desc">Darzoviu sriuba<br />
        <i><span class="ingredients"> Brokoliai, morkos, bulves</span></i>
                            </div>

                            <div align="right"><b>LT;3.99</b></div>
 
                           <div align="right"><button class="btn btn-success btnadd" onclick="Add(25,-1);">
                                <span class="glyphicon glyphicon-plus"></span></button></div>
 
 <div class="product2"> 2.</div>
        <div class="product2 desc">Vistienos kepsnys apkeptas suriu<br />
        <i><span class="ingredients"> Vistiena, suris, morkos, salotos</span></i>
                            </div>

                            <div align="right"><b>LT;13.99</b></div>
 
                           <div align="right"><button class="btn btn-success btnadd" onclick="Add(25,-1);">
                                <span class="glyphicon glyphicon-plus"></span></button></div>

		<div class="product3"> 3.</div>
        <div class="product3 desc">Kiaulienos kepsnys<br />
        <i><span class="ingredients"> Kiauliena, morkos, salotos</span></i>
                            </div>

                            <div align="right"><b>LT;15.99</b></div>
 
                           <div align="right"><button class="btn btn-success btnadd" onclick="Add(25,-1);">
                                <span class="glyphicon glyphicon-plus"></span></button></div>
<div class="product4"> 4.</div>
        <div class="product4 desc">Lasisos kepsnys<br />
        <i><span class="ingredients"> Lasisa, morku salotos</span></i>
                            </div>

                            <div align="right"><b>LT;16.99</b></div>
 
                           <div align="right"><button class="btn btn-success btnadd" onclick="Add(25,-1);">
                                <span class="glyphicon glyphicon-plus"></span></button></div>

<h1> Saltieji patiekalai </h1>
	<div class="product5"> 5.</div>
        <div class="product5 desc">Zaliosios salotos<br />
        <i><span class="ingredients"> Morkos, kopustai , paprika</span></i>
                            </div>

                            <div align="right"><b>LT;7.99</b></div>
 
                           <div align="right"><button class="btn btn-success btnadd" onclick="Add(25,-1);">
                                <span class="glyphicon glyphicon-plus"></span></button></div>	
								
	<div class="product6"> 6.</div>
        <div class="product6 desc">Salotos su vistiena<br />
        <i><span class="ingredients"> Kepta vistiena, salotos, skrebuciai, suris, majonezas </span></i>
                            </div>

                            <div align="right"><b>LT;11.99</b></div>
 
                           <div align="right"><button class="btn btn-success btnadd" onclick="Add(25,-1);">
                                <span class="glyphicon glyphicon-plus"></span></button></div>		

<div class="product7"> 7.</div>
        <div class="product7 desc">Lavaso suktinukas su lasisa<br />
        <i><span class="ingredients"> Lasisa,lavasas, agurkas, paprika, majonezas </span></i>
                            </div>

                            <div align="right"><b>LT;8.99</b></div>
 
                           <div align="right"><button class="btn btn-success btnadd" onclick="Add(25,-1);">
                                <span class="glyphicon glyphicon-plus"></span></button></div>			

<div class="product8"> 8.</div>
        <div class="product8 desc">Apkepta zuvis<br />
        <i><span class="ingredients"> Zuvis, morku salotos </span></i>
                            </div>

                            <div align="right"><b>LT;7.99</b></div>
 
                           <div align="right"><button class="btn btn-success btnadd" onclick="Add(25,-1);">
                                <span class="glyphicon glyphicon-plus"></span></button></div>			
<h1> Desertai </h1>
<div class="product9"> 9.</div>
        <div class="product9 desc">Ledai su vaisiais<br />
        <i><span class="ingredients"> Vaniliniai ledai, persikai, bananai, kiviai  </span></i>
                            </div>

                            <div align="right"><b>LT;4.99</b></div>
 
                           <div align="right"><button class="btn btn-success btnadd" onclick="Add(25,-1);">
                                <span class="glyphicon glyphicon-plus"></span></button></div>

<div class="product10"> 10.</div>
  <div class="product10 desc">Obuoliu pyragas <br />
        <i><span class="ingredients"> Obuoliu pyragas, grietinele </span></i>
                            </div>

                            <div align="right"><b>LT;5.99</b></div>
 
                           <div align="right"><button class="btn btn-success btnadd" onclick="Add(25,-1);">
                                <span class="glyphicon glyphicon-plus"></span></button></div>
		
<h1> Gerimai </h1>	

	<div class="product11"> 11.</div>
  <div class="product11 desc">Zalioji arbata <br />
       <div align="right"><b>LT;2.99</b></div>
             <div align="right"><button class="btn btn-success btnadd" onclick="Add(25,-1);">
                   <span class="glyphicon glyphicon-plus"></span></button></div>
				   
<div class="product12"> 12.</div>
  <div class="product12 desc">Kava <br />
       <div align="right"><b>LT;2.99</b></div>
             <div align="right"><button class="btn btn-success btnadd" onclick="Add(25,-1);">
                   <span class="glyphicon glyphicon-plus"></span></button></div>				   
				   
<div class="product13"> 13.</div>
  <div class="product13 desc">Vanduo <br />
       <div align="right"><b>LT;1.99</b></div>
             <div align="right"><button class="btn btn-success btnadd" onclick="Add(25,-1);">
                   <span class="glyphicon glyphicon-plus"></span></button></div>				   
<?


//Nuoroda į pradžią
   echo "<br>Atgal į [<a href=\"index.php\">Pradžia</a>]<br>";

        ?>
    </body>

</html>
	
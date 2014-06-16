<?
include("include/session.php");
?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Meniu1</title>
    <body>
<style>
<!------------------------------------------------->
	form {background-color:#F1FCA3;}
	body {background-color:#F1FCA2;}
<!------------------------------------------------->
</style>
<?
 <h4>
                        <a id="Starters" name="Starters"></a>
                            Starters
                    </h4>
                    
					 <div class="row margin20 clearfix bordertopbot">
					
                                   <div class="product10w toppad15 code"> 100.</div>
                                
						  <div class="product40w toppad15 desc">Thai Mix<br />
                                <i><span class="small">Prawn toast, chicken satay, spring rolls,
bangkok chicken</span></i>
                            </div>
                            
					     <div class="product20w toppad15 ">
						 
                        </div>
                        <div class="product20w toppad15 rightpad10">
                            
                            <div align="right"><b>&pound;3.95</b></div>
                            
                        </div>
                        <div class="product10w toppad10 bottompad10 rightpad10">
                            
                           <div align="right"><button class="btn btn-success btnadd" onclick="Add(25,-1);">
                                <span class="glyphicon glyphicon-plus"></span></button></div>
                            
                        </div>
                    </div>
                    
					 <div class="row margin20 clearfix bordertopbot">
					
                                   <div class="product10w toppad15 code"> 115.</div>
                                
						  <div class="product40w toppad15 desc">Winter Mix<br />
                                <i><span class="small">Steamed mushroom, Bangkok Chicken, Duck
Roll and Money Bag</span></i>
                            </div>
                            
					     <div class="product20w toppad15 ">
						 
                        </div>
                        <div class="product20w toppad15 rightpad10">
                            
                            <div align="right"><b>&pound;3.95</b></div>
                            
                        </div>
                        <div class="product10w toppad10 bottompad10 rightpad10">
                            
                           <div align="right"><button class="btn btn-success btnadd" onclick="Add(26,-1);">
                                <span class="glyphicon glyphicon-plus"></span></button></div>
                            
                        </div>
                    </div>
                    
					 <div class="row margin20 clearfix bordertopbot">
					
                                   <div class="product10w toppad15 code"> 101.</div>
                                
						  <div class="product40w toppad15 desc">Sesame Prawn on Toast<br />
                                <i><span class="small">Prawn on toast</span></i>
                            </div>
                            
					     <div class="product20w toppad15 ">
						 
                        </div>
                        <div class="product20w toppad15 rightpad10">
                            
                            <div align="right"><b>&pound;2.50</b></div>
                            
                        </div>
                        <div class="product10w toppad10 bottompad10 rightpad10">
                            
                           <div align="right"><button class="btn btn-success btnadd" onclick="Add(27,-1);">
                                <span class="glyphicon glyphicon-plus"></span></button></div>
                            
                        </div>
                    </div>
                    
					 <div class="row margin20 clearfix bordertopbot">
					
                                   <div class="product10w toppad15 code"> 102.</div>
                                
						  <div class="product40w toppad15 desc">Chicken Satay<br />
                                <i><span class="small">Marinated Chicken breast with turmeric,mixed
herbs, char-grilled and served with peanut sauce</span></i>
                            </div>
                            
					     <div class="product20w toppad15 ">
						 
                        </div>
                        <div class="product20w toppad15 rightpad10">
                            
                            <div align="right"><b>&pound;3.95</b></div>
                            
                        </div>
                        <div class="product10w toppad10 bottompad10 rightpad10">
                            
                           <div align="right"><button class="btn btn-success btnadd" onclick="Add(28,-1);">
                                <span class="glyphicon glyphicon-plus"></span></button></div>
                            
                        </div>
                    </div>

	echo "<img src=\"pictures/top.png\" /><br>";

        echo "<img src=\"pictures/meniu.png\" /><br>";

//Nuoroda į pradžią
   echo "<br>Atgal į [<a href=\"index.php\">Pradžia</a>]<br>";

        ?>
    </body>
</html>
	
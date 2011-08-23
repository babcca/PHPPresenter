
<form action="" method="post">
	<input type="hidden" name="app" value="form" />
	<input type="hidden" name="method" value="save_form" />
	<div id="acordion">
		<h3><a href="#">Informace o klientovy</a></h3>
    	<div>
      		<input type="hidden" name="client_id" value="0" />
      		<div><label>Jmeno klienta: </label><input type="text" size="20" id="client_name" name="client[name]" />
      		<label>Narozen/ICO: </label><input style="width: 70px;" type="text" size="8" name="client[birth]" id="birth" /> </div>
      		<label>Adresa klienta:</label><br>
      		<input style="width:100%" type="text" size="50" name="client[address]" id="address" />
    	</div>
    	
    	<h3><a href="#">Pozadavky a potreby klienta</a></h3>
 		<div>
	  		<div class="text-box">
        		<label><b>Pozadavky a potreby klienta:</b></label><br />
        		<textarea cols="40" rows="5" name="client_needs"></textarea>
      		</div>
      		<div class="text-box">
        		<label><b>Klient pozaduje uzavreni pojistnych produktu:</b></label><br />
        		<textarea cols="40" rows="5" name="client_demands"></textarea>
      		</div>
   		</div> 
   		
   		<h3><a href="#">Vyber pojistneho produktu</a></h3>
   		<div>
    	<!-- START Pojistne produkty --> 
    		<table>
    			<tr>
    				<th>Typ produktu</th><th>Pojistovna</th><th>Produkty</th><th></th>
    			</tr>
    			<tr>
    				<td>{html_options style="width: 200px;" name="products-list" options=$products}</td>
    				<td>{html_options style="width: 200px;" name="insurence-list" options=$insurences}</td>
    				<td>{html_options style="width: 200px;" name="product-list" options=$product}</td>
    				<td><input type="button" value="U" name="update-product" /></td>
    			</tr> 
    		</table>
        	<div class="text-box">
          		<textarea cols="40" rows="5" name="product_text"></textarea>
        	</div>
        
        	<div class="text-box">
          		<label><u>Pozadavkum a potrebam klienta vyhovuji tyto produkty:</u></label><br />
          		<textarea cols="40" rows="5" name="client_agree"></textarea>
        	</div>  
          
        	<div class="text-box">
          		<label><u>Pozadavky a potreby, ktere musely byt odmitnuty:</u></label><br />
          		<textarea cols="40" rows="5" name="adviser_reject"></textarea>
        	</div>
        
        	<div class="text-box">
          		<label><u>Pojistne podminky odmitnute klientem:</u></label><br />
          		<textarea cols="40" rows="5" name="client_reject"></textarea>
        	</div>
        	<!-- KONEC Pojistnych produktu --> 
      </div>
    </div>
   
    <div>
       	<label>Datum: </label><input type="text" name="date" value="{$smarty.now|date_format:"%e.%m.%Y"}" />
       	<label>Misto: </lable><input type="text" name="place" value="ve Svetle nad Sazavou" />
    </div>
      
    <div style="text-align: right;">
      <input type="reset" value="Resetuj formular" onclick="return confirm('Resetovat data?');" />
      <input type="submit" value="Ulozit formular" onclick="return confirm('Ulozit data?');"/>
    </div>
  </form>
{include file='js.tpl'}
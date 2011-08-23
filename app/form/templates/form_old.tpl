<form action="" method="post">
	<input type="hidden" name="app" value="form" />
	<input type="hidden" name="method" value="save_form" />
    <div>
      <div style="width:450px; display:inline-block; vertical-align: top;">
      	  <input type="hidden" name="client_id" value="0" />
          <div><label>Jmeno klienta: </label><input type="text" size="20" id="client_name" name="client[name]" />
          <label>Narozen/ICO: </label><input style="width: 70px;" type="text" size="8" name="client[birth]" id="birth" /> </div>
          <label>Adresa klienta:</label><br>
          <input style="width:100%" type="text" size="50" name="client[address]" id="address" />
      </div>
      
      <div style="width:450px; display:inline-block; padding-left: 15px ">
       <div>
          <div class="checkbox"><input type="checkbox" name="products[kapitalove]"> Kapitalove zivotni</div>
          <div class="checkbox"><input type="checkbox" name="products[vozidla]"> Vozidla</div>
        </div>
        <div>
          <div class="checkbox"><input type="checkbox" name="products[rizikove]"> Rizikove zivotni</div>  
          <div class="checkbox"><input type="checkbox" name="products[podnikatele]"> Podnikatele</div>
        </div>
        <div>
          <div class="checkbox"><input type="checkbox" name="products[majetkove]"> Majetkove</div>  
          <div class="checkbox"><input type="checkbox" name="products[pravni_ochrana]"> Pravni ochrana</div>
        </div> 
        <div> 
          <div class="checkbox"><input type="checkbox" name="products[odpovednost]"> Odpovednost</div>
          <div style="display: inline-block;"><input type="checkbox" name="products[ostatni]"> Ostatni <input type="text" name="products[ostatni_text]" /></div>
        </div>   
      </div>
    </div>  
    
    <div style="padding-top: 15px;">   
      <div style="width:450px; display:inline-block; vertical-align: top; ">
        <div class="text-box">
          <label><b>Pozadavky a potreby klienta:</b></label><br />
          <textarea cols="40" rows="5" name="client_needs"></textarea>
        </div>
        <div class="text-box">
          <label><b>Klient pozaduje uzavreni pojistnych produktu:</b></label><br />
          <textarea cols="40" rows="5" name="client_demands"></textarea>
        </div>
        <div>
        	<label>Datum: </label><input type="text" name="date" value="{$smarty.now|date_format:"%e.%m.%Y"}" /><br />
        	<label>Misto: </lable><input type="text" name="place" value="ve Svetle nad Sazavou" />
        </div>
      </div>
      
      <div style="width:450px; display:inline-block; margin-left: 15px;">
        <div class="text-box">
          <label><b>Vyber pojistneho produktu:</b></label><br />
          <div id="product-box">
            <label>Pojistovna:</label>
            <select name="insurence-list">
              <option value="1">Ceska pojistovna</option>
              <option value="2">Gennerali pojistovna</option>
            </select>
            <label>Typ produku</label>
            <select name="product-list">
              <option value="1">Motocykl</option>
              <option value="2">Automobyl</option>
              <option value="3">Prives</option>
            </select>
          </div>
          <br />
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
      </div>
    </div>
    <div style="text-align: right;">
      <input type="reset" value="Resetuj formular" onclick="return confirm('Resetovat data?');" />
      <input type="submit" value="Ulozit formular" onclick="return confirm('Ulozit data?');"/>
    </div>
  </form>
{include file='js.tpl'}
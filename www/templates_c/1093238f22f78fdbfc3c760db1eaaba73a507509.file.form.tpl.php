<?php /* Smarty version Smarty-3.0.7, created on 2011-08-23 02:07:57
         compiled from "D:\projects\php\albatros\lib/../app/form/templates\form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:102494e52ef5d5696c0-18302951%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1093238f22f78fdbfc3c760db1eaaba73a507509' => 
    array (
      0 => 'D:\\projects\\php\\albatros\\lib/../app/form/templates\\form.tpl',
      1 => 1314058076,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102494e52ef5d5696c0-18302951',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_options')) include 'D:\projects\php\albatros\lib\smarty\plugins\function.html_options.php';
if (!is_callable('smarty_modifier_date_format')) include 'D:\projects\php\albatros\lib\smarty\plugins\modifier.date_format.php';
?>
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
    				<td><?php echo smarty_function_html_options(array('style'=>"width: 200px;",'name'=>"products-list",'options'=>$_smarty_tpl->getVariable('products')->value),$_smarty_tpl);?>
</td>
    				<td><?php echo smarty_function_html_options(array('style'=>"width: 200px;",'name'=>"insurence-list",'options'=>$_smarty_tpl->getVariable('insurences')->value),$_smarty_tpl);?>
</td>
    				<td><?php echo smarty_function_html_options(array('style'=>"width: 200px;",'name'=>"product-list",'options'=>$_smarty_tpl->getVariable('product')->value),$_smarty_tpl);?>
</td>
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
       	<label>Datum: </label><input type="text" name="date" value="<?php echo smarty_modifier_date_format(time(),"%e.%m.%Y");?>
" />
       	<label>Misto: </lable><input type="text" name="place" value="ve Svetle nad Sazavou" />
    </div>
      
    <div style="text-align: right;">
      <input type="reset" value="Resetuj formular" onclick="return confirm('Resetovat data?');" />
      <input type="submit" value="Ulozit formular" onclick="return confirm('Ulozit data?');"/>
    </div>
  </form>
<?php $_template = new Smarty_Internal_Template('js.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
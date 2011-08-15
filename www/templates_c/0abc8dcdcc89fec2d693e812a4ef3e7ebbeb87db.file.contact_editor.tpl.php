<?php /* Smarty version Smarty-3.0.7, created on 2011-08-15 22:53:45
         compiled from "H:\Mago\WebPages\Pension_Barbora\web\lib/../app/contact/templates\contact_editor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:81464e498759dcd9d6-15336861%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0abc8dcdcc89fec2d693e812a4ef3e7ebbeb87db' => 
    array (
      0 => 'H:\\Mago\\WebPages\\Pension_Barbora\\web\\lib/../app/contact/templates\\contact_editor.tpl',
      1 => 1313441601,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '81464e498759dcd9d6-15336861',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div>
	<h1>Nastaveni kontaktnich informaci</h1>
	<?php echo smarty_function_get_message(array('id'=>'contact_editor','timeout'=>5000),$_smarty_tpl);?>

	<form action="" method="post">
		<input type="hidden" name="app" value="contact" />
		<input type="hidden" name="method" value="contact_update" />
		<textarea name="contact_table" cols="30" rows="20" style="width: 100%; height: 350px;"><?php echo $_smarty_tpl->getVariable('contact_table')->value;?>
</textarea>
		<div style="text-align: right"><input type="submit" class="submit-button" value="Ulozit"/></div>
	</form>
</div>
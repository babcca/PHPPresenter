<?php /* Smarty version Smarty-3.0.7, created on 2011-08-15 22:53:31
         compiled from "H:\Mago\WebPages\Pension_Barbora\web\lib/../app/book/templates\quick_book.tpl" */ ?>
<?php /*%%SmartyHeaderCode:314764e49874bd7c9a3-77095216%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b901a2c5198eb52872ad543e80d3d918e25f8c43' => 
    array (
      0 => 'H:\\Mago\\WebPages\\Pension_Barbora\\web\\lib/../app/book/templates\\quick_book.tpl',
      1 => 1313441601,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '314764e49874bd7c9a3-77095216',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_options')) include 'H:\Mago\WebPages\Pension_Barbora\web\lib\smarty\plugins\function.html_options.php';
?><h1><?php echo $_smarty_tpl->getVariable('trans')->value['book_online'];?>
</h1>
<div style="">
<form class="quick-book-form" method="post" action="">
	<table border="0">
	<tr>
		<td colspan="3"><input readonly="readonly" class="text-input" type="text" id="date_from_quick" name="date_from_quick" value="check in" size="15" /></td>
	</tr>
	<tr>
		<td colspan="3"><input readonly="readonly" class="text-input" type="text" id="date_to_quick" name="date_to_quick" size="15" value="check out" /></td>
	</tr>
	<tr>
		<td><label><?php echo $_smarty_tpl->getVariable('trans')->value['guests'];?>
</label></td>
		<td>
			<?php echo smarty_function_html_options(array('values'=>array(1,2,3,4,5,0),'output'=>array(1,2,3,4,5,'more'),'name'=>'guests_quick'),$_smarty_tpl);?>

		</td>
		<td>
			<input type="submit" class="book-button" value=""/>
		</td>
	</tr>
	</table>
	<input type="hidden" name="app" value="book" />
	<input type="hidden" name="method" value="redirect" />
	<input type="hidden" name="lang" value="<?php echo $_smarty_tpl->getVariable('lang')->value;?>
" />
</form>
</div>
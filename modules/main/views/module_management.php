<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<style>
	div.module-management-container{
		display:block;
		float: left;
		margin: 10px;
		width: 130px;
		height: 100px;
		background-color:#EEEEEE;
	    padding: 5px 5px 5px 5px;
	    margin : 10px;
	    font-size: small;
	    min-height : 25px;
	    border-radius:5px;
	    -moz-border-radius:5px;
	    -moz-box-shadow:    1px 1px 1px 1px #ccc;
	    -webkit-box-shadow: 1px 1px 1px 1px #ccc;
	    box-shadow:         1px 1px 1px 1px #ccc;	
	    text-align: center;	
	    background-position: 110px 80px;
		background-repeat: no-repeat;
	}
	div.module-management-container>a{
		width: 100%;
		height: 100%;
		display: block;		
	}
	div.module-management-container img.logo{
		max-width: 90%;
		height: auto;
	}
	div.module_installed{
		background-image: url('<?php echo base_url('assets/nocms/images/icons/checkbox_checked.png');?>');		
	}
	div.module_not_installed{
		background-image: url('<?php echo base_url('assets/nocms/images/icons/checkbox_unchecked.png');?>');		
	}
	#message:not(:empty){
        background-color:#FFCACA;
	    padding: 5px 5px 5px 5px;
	    margin : 10px;
	    font-size: small;
	    min-height : 25px;
	    border-radius:5px;
	    -moz-border-radius:5px;
	    -moz-box-shadow:    1px 1px 5px 6px #ccc;
	    -webkit-box-shadow: 1px 1px 5px 6px #ccc;
	    box-shadow:         1px 1px 5px 6px #ccc;	
	    margin-top: 30px;
	    clear:both;    
    }
</style>
<h3>Module Management</h3>
<?php
    foreach($modules as $module){
        $str_status = $module['installed']?'module_installed':'module_not_installed';           
         
        echo '<div class="module-management-container '.$str_status.'">';
        if(!$module['installed']){
        	echo '<a href="'.site_url($module['module_path'].'/install').'">';
        }else{
        	echo '<a href="'.site_url($module['module_path'].'/install/uninstall').'">'; 
        }
        echo '<b><i>'.$module['module_path'].'</i></b><br /><br />';
        $image_path = base_url('modules/'.$module['module_path'].'/icon.png');
        if(@file_get_contents($image_path,0,NULL,0,1)){
        	echo '<img class="logo" src="'.$image_path.'" />';
        }else{
        	echo '<img class="logo" src="'.base_url('assets/nocms/images/icons/package.png').'" />';
        }
        echo '</a>';
        echo '</div>';
    }
	echo '<div style="clear:both"></div>';
    if($upload['uploading'] && !$upload['success']){    	
    	echo '<div id="message">';
    	echo '<b>Error:</b> '.$upload['message'];
    	echo '</div>';
    }
?>
<div style="clear:both; margin: 5px;">	
	<form action="<?php echo site_url('main/module_management');?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<input type="file" name="userfile" size="20" />	
		<br /><br />	
		<input name="upload" class="btn btn-primary" type="submit" value="Upload New Module" />	
	</form>
</div>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ipcame</title>

  <script language="javascript" type="text/javascript" src="/functions.js"></script>
<script language="javascript">

      function send_command(cmd) {
        document.getElementById('hints').firstChild.nodeValue = "Send command: " + cmd;
        AJAX_get('/?action=command&command='+ cmd)
      }

      function AJAX_response(text) {
        document.getElementById('hints').firstChild.nodeValue = "Got response: " + text;
      }

      function KeyDown(ev) {
        ev = ev || window.event;
        pressed = ev.which || ev.keyCode;

        switch (pressed) {
          case 37:
              send_command('pan_plus');
            break;
          case 39:
              send_command('pan_minus');
            break;
          case 38:
              send_command('tilt_minus');
            break;
          case 40:
              send_command('tilt_plus');
            break;
          case 32:
              send_command('reset_pan_tilt');
          break;
          default:
              break;
        }
      }

      document.onkeydown = KeyDown;

    </script>

<style type="text/css">
.a {
	color: #006;
}
</style>
</head>

<body onload="MM_preloadImages('photo/bfl-1.jpg','photo/bfl-1.jpg')"; >
	<table width="800" height="580" border="0" align="center" background="bark.jpg">
  		<tr>
    		<th height="73" colspan="2" scope="col">&nbsp;</th>
	  </tr>
  		<tr>
    		<td width="621" height="501">
				<div align="center" id="streamer">
	  				
					<?php 
						echo "<img src=http://";
						echo "10.110.20.239";
						echo ":8080/?action=stream/>";
					?>
                    
                    <p>
              </div>
				<div align="center"></div>
            </td>
   
    		<td width="169" valign="top">
            <form name="command_panel" action="" onSubmit="return false;">
            	<p><p>
            	<font size="2" color="#FFF">
                &nbsp;&nbsp;
            		<? 
						echo "  使用者：";
						echo $_SERVER['REMOTE_ADDR'];
					?>
            	</font>
             <br><br><br><br><br><br><br>                
           	  <table width="132" border="0">
            	  <tr>
            	    <td width="43">&nbsp;</td>
            	    <td width="38"><input type="button" value="tilt +" onclick="send_command('tilt_plus')" /></td>
            	    <td width="37">&nbsp;</td>
          	    </tr>
            	  <tr>
            	    <td><input type="button" value="pan +" onclick="send_command('pan_plus')" /></td>
            	    <td>&nbsp;</td>
            	    <td><input type="button" value="pan -" onclick="send_command('pan_minus')" /></td>
          	    </tr>
            	  <tr>
            	    <td>&nbsp;</td>
            	    <td><input type="button" value="tilt -" onclick="send_command('tilt_minus')" /></td>
            	    <td>&nbsp;</td>
          	    </tr>
          	  </table>
           	  <p class="a">我想直接輸入</p>
           	  <table width="106" border="0">
           	    <tr>
            	    <td colspan="2"><input type="input" value="0" name="tilt" width="50" />
           	        <input type="button" value="set tilt" onclick="send_command('tilt_set&amp;value='+this.form.tilt.value)" /></td>
            	    <td width="47">&nbsp;</td>
          	    </tr>
            	  <tr>
            	    <td colspan="2"><input type="input" value="0" name="pan" width="50" />            	      <input type="button" value="set pan" onclick="send_command('pan_set&amp;value='+this.form.pan.value)" /></td>
            	    <td>&nbsp;</td>
          	    </tr>
          	  </table>
            	<p><br>
       	    </form></td>
  </tr>
</table>

 

</body>
</html>
<!-- `
不跳一：
<iframe name="testserver" style="display:none;" src=''></iframe> 
<form name="settest" action="test.cgi" target="testserver">
test.cgi可以替换为任意要转向的html网页，form的target需要与iframe name保持一致
-->

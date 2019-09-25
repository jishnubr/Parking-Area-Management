<?php
	include("file protection.php");
?>
<tbody>
    <tr>
      <th scope="col">token no&nbsp;</th>
      <th scope="col">slot_no&nbsp;</th>
	 <th scope="col">Vehicle_number&nbsp;</th>
	<th scope="col">date&nbsp;</th>
    </tr>
   
    <tr>
      <td>&nbsp;<?php echo $token_no;?></td>
      <td>&nbsp; <?php echo $slot_no;?></td>
	  <td>&nbsp; <?php echo $Vehicle_number;?> </td>
	<td>&nbsp; <?php
	$join_date=date("d-M-Y",$jointime);
	$time=date("\a\\t g.i a",$jointime);
	echo $join_date.'<br>'.$time;?></td>
    </tr>
  </tbody>

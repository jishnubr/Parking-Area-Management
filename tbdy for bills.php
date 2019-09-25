<?php
	include("file protection.php");
	include("date and duration cal.php");
?>
<tbody>
    <tr>
      <th scope="col">bill no&nbsp;</th>
      <th scope="col">owner_ID_no&nbsp;</th>
      <th scope="col">Vehicle_number&nbsp;</th>
	<th scope="col">join_date&nbsp&nbsp&nbsp&nbsp;</th>
	 <th scope="col">halt_date&nbsp&nbsp;</th>
     	<th scope="col">Charged_Duraton<small><br/>(in_hour(s))</small>&nbsp&nbsp;</th>
        <th scope="col">Rate_Per_Hour&nbsp&nbsp;</th>
	<th scope="col">charges&nbsp;</th>
    </tr>    
    <tr>
      <td>&nbsp;<?php echo $bill_no;?></td>
      <td>&nbsp;<?php echo $owner_ID_no;?> </td>
      <td>&nbsp;<?php echo $Vehicle_number;?></td>
	<td>&nbsp;<?php echo $join_date.'<br>'.$join_time;?></td>
	 <td>&nbsp;<?php echo $halt_date.'<br>'.$halt_time;?>
     </td><td>&nbsp; <?php echo $duration;?></td>
     <td>&nbsp; <?php echo $rate;?></td>
	<td>&nbsp; <?php echo $charges;?></td>
    </tr>
  </tbody>

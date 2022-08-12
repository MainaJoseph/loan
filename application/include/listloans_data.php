<div class="row">       
		    <section class="content">  
	        <div class="box box-success">
            <div class="box-body">
              <div class="table-responsive">
             <div class="box-body">
<form method="post">
			 <a href="dashboard.php?id=<?php echo $_SESSION['tid']; ?>&&mid=<?php echo base64_encode("401"); ?>"><button type="button" class="btn btn-flat btn-warning"><i class="fa fa-mail-reply-all"></i>&nbsp;Back</button> </a> 
<?php
$check = mysqli_query($link, "SELECT * FROM emp_permission WHERE tid = '".$_SESSION['tid']."' AND module_name = 'Loan Details'") or die ("Error" . mysqli_error($link));
$get_check = mysqli_fetch_array($check);
$pdelete = $get_check['pdelete'];
$pcreate = $get_check['pcreate'];
$pupdate = $get_check['pupdate'];
?>
	<?php echo ($pdelete == '1') ? '<button type="submit" class="btn btn-flat btn-danger" name="delete"><i class="fa fa-times"></i>&nbsp;Multiple Delete</button>' : ''; ?>
	<?php echo ($pcreate == '1') ? '<a href="newloans.php?id='.$_SESSION['tid'].'&&mid='.base64_encode("405").'"><button type="button" class="btn btn-flat btn-success"><i class="fa fa-plus"></i>&nbsp;Add Loans</button></a>' : ''; ?>
<?php
$get = mktime(0,0,0,date("m"),date("d"),date("Y"));
$date = date("d/m/Y",$get);
$select = mysqli_query($link, "SELECT * FROM loan_info WHERE pay_date >= '$date' AND pay_date < '$date'") or die (mysqli_error($link));
$num = mysqli_num_rows($select);
?>
	<button type="button" class="btn btn-flat btn-danger"><i class="fa fa-times"></i>&nbsp;Overdue:&nbsp;<?php echo number_format($num,0,'.',','); ?></button>
	
	<a href="printloan.php" target="_blank" class="btn btn-info btn-flat"><i class="fa fa-print"></i>&nbsp;Print</a>
	<a href="exportloan.php" target="_blank" class="btn btn-success btn-flat"><i class="fa fa-send"></i>&nbsp;Export Excel</a>
	
	<hr>		
			  
			 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><input type="checkbox" id="select_all"/></th>
                  <th>Kind of Loan</th>
				  <th>Account</th>
                  <th>Description</th>
                  <th>Amount</th>
                  <th>Balance</th>
                  <th>Customer</th>
				  <th>Agent</th>
                  <th>Approve By</th>
                  <th>date Release</th>
                  <th>Payment Date</th>
                  <th>Approval Status</th>
				  <th>Update Status</th>
                  <th>Action</th>
                 </tr>
                </thead>
                <tbody> 
<?php
$select = mysqli_query($link, "SELECT * FROM loan_info") or die (mysqli_error($link));
if(mysqli_num_rows($select)==0)
{
echo "<div class='alert alert-info'>No data found yet!.....Check back later!!</div>";
}
else{
while($row = mysqli_fetch_array($select))
{
$id = $row['id'];
$borrower = $row['borrower'];
$status = $row['status'];
$upstatus = $row['upstatus'];
$selectin = mysqli_query($link, "SELECT fname, lname FROM borrowers WHERE id = '$borrower'") or die (mysqli_error($link));
$geth = mysqli_fetch_array($selectin);
$name = $geth['fname'];
?> 
<?php
if($upstatus == "Pending")
{
?>  
                <tr>
				<td><input id="optionsCheckbox" class="checkbox" name="selector[]" type="checkbox" value="<?php echo $row['id']; ?>"></td>
                <td><?php echo "Flexible"; ?></td>
				<td><?php echo $row['baccount']; ?></td>
				<td><?php echo $row['desc']; ?></td>
                <td><?php echo $row['amount']; ?></td>
				<td><?php echo $row['amount_topay']; ?></td>
				<td><?php echo $geth['fname']; ?></td>
				<td><?php echo $row['agent']; ?></td>
			    <td><?php echo $row['teller']; ?></td>
				<td><?php echo $row['date_release']; ?></td>
				<td><?php echo $row['pay_date']; ?></td>
                <td>
				 <span class="label label-<?php if($status =='Approved')echo 'success'; elseif($status =='Disapproved')echo 'danger'; else echo 'warning';?>"><?php echo $status; ?></span>
				</td>
			<td align="center" class="alert alert-danger"><?php echo $upstatus; ?><br><?php echo ($pupdate == '1') ? '<a href="updateloans.php?id='.$id.'&&mid='.base64_encode("405").'">Click here to complete Registration!</a>' : ''; ?></td>
			<td>
			<?php echo ($pupdate == '1') ? '<a href="#myModal '.$id.'"> <button type="button" class="btn btn-primary btn-flat" data-target="#myModal'.$id.'" data-toggle="modal"><i class="fa fa-edit"></i></button></a>' : ''; ?>
			<?php echo ($pupdate == '1') ? '<a href="updateloans.php?id='.$id.'&&mid='.base64_encode("405").'"><button type="button" class="btn btn-flat btn-info"><i class="fa fa-eye"></i></button></a>' : ''; ?>
<?php
$se = mysqli_query($link, "SELECT * FROM attachment WHERE get_id = '$borrower'") or die (mysqli_error($link));
while($gete = mysqli_fetch_array($se))
{
?>
				<a href="<?php echo $gete['attached_file']; ?>"><button type="button" class="btn btn-flat btn-success"><i class="fa fa-download"></i></button></a></td>
<?php } ?>
						    
			    </tr>
<?php
}
else{
?>
				<tr>
				<td><input id="optionsCheckbox" class="checkbox" name="selector[]" type="checkbox" value="<?php echo $row['id']; ?>"></td>
                <td><?php echo "Flexible"; ?></td>
				<td><?php echo $row['baccount']; ?></td>
				<td><?php echo $row['desc']; ?></td>
                <td><?php echo $row['amount']; ?></td>
				<td><?php echo $row['amount_topay']; ?></td>
				<td><?php echo $geth['fname']; ?></td>
				<td><?php echo $row['agent']; ?></td>
			    <td><?php echo $row['teller']; ?></td>
				<td><?php echo $row['date_release']; ?></td>
				<td><?php echo $row['pay_date']; ?></td>
                <td>
				<span class="label label-<?php if($status =='Approved')echo 'success'; elseif($status =='Disapproved')echo 'danger'; else echo 'warning';?>"><?php echo $status; ?></span>
				</td>
				<td align="center" class="alert alert-success"><?php echo $upstatus; ?></td>
				<td>
				<?php echo ($pupdate == '1') ? '<a href="#myModal '.$id.'"> <button type="button" class="btn btn-primary btn-flat" data-target="#myModal'.$id.'" data-toggle="modal"><i class="fa fa-edit"></i></button></a>' : ''; ?>
			<?php echo ($pupdate == '1') ? '<a href="updateloans.php?id='.$id.'&&mid='.base64_encode("405").'"><button type="button" class="btn btn-flat btn-info"><i class="fa fa-eye"></i></button></a>' : ''; ?>
<?php
$se = mysqli_query($link, "SELECT * FROM attachment WHERE get_id = '$borrower'") or die (mysqli_error($link));
while($gete = mysqli_fetch_array($se))
{
?>
				<a href="<?php echo $gete['attached_file']; ?>"><button type="button" class="btn btn-flat btn-success"><i class="fa fa-download"></i></button></a>
<?php } ?>
				</td>	    
			    </tr>
<?php } } } ?>
             </tbody>
                </table>  
<?php
						if(isset($_POST['delete'])){
						$idm = $_GET['id'];
							$id=$_POST['selector'];
							$N = count($id);
						if($id == ''){
						echo "<script>alert('Row Not Selected!!!'); </script>";	
						echo "<script>window.location='listloans.php?id=".$_SESSION['tid']."'; </script>";
							}
							else{
							for($i=0; $i < $N; $i++)
							{
								$result = mysqli_query($link,"DELETE FROM loan_info WHERE id ='$id[$i]'");
								echo "<script>alert('Row Delete Successfully!!!'); </script>";
								echo "<script>window.location='listloans.php?id=".$_SESSION['tid']."'; </script>";
							}
							}
							}
?>			

</form>				

              </div>


	
</div>	
</div>
</div>	
</div>
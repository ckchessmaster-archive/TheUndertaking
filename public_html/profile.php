<?php session_start();
require_once('../resources/dbManager.php');
$id=$_SESSION['SESS_MEMBER_ID'];
$resultSet = mysql_query("SELECT * FROM member where mem_id='$id'");
while($row3 = mysql_fetch_array($resultSet))
{
$fname=$row3['fname'];
$lname=$row3['lname'];
$email=$row3['email'];
$username=$row3['username'];
$picture=$row3['picture'];

}
?>
<table width="398" border="0" align="center" cellpadding="0">
  <tr>
    <td height="26" colspan="2">Your Profile Information </td>
	<td><div align="right"><a href="index.php">logout</a></div></td>
  </tr>
  <tr>
    <td width="129" rowspan="5"><img src="<?php echo $picture ?>" width="129" height="129" alt="no image found"/></td>
    <td width="82" valign="top"><div align="left">FirstName:</div></td>
    <td width="165" valign="top"><?php echo $fname ?></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">LastName:</div></td>
    <td valign="top"><?php echo $lname ?></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">email:</div></td>
    <td valign="top"><?php echo $email ?></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">username:</div></td>
    <td valign="top"><?php echo $username ?></td>
  </tr>
</table>
<p align="center"><a href="index.php"></a></p>

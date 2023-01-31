<?php
include('menu.php');
include_once 'dbconnect.php';
$_REQUEST=$_REQUEST['RecordMode'];
$Orderno="";
if ($RecordMode == 'Edit'){
    $Orderno=$_REQUEST['Orderno'];
    // echo $Orderno;
}
$Orderno="";
$OrderDate="";
$Amount="";
if (!empty($Oderno)) 
{
$sql ="SELECT OrderNo,OrderDate,Amount FROM OrderNo
WHERE OrderNo='$OrderNo'";  
// echo $sql;
$result = $conn->query($sql);
while ($row = $result->fetch_assoc())
}
?>

<!DOCTYPE html>
<html>
    <body>
        <FORM method="submit" action="OrderInsert.php"><font color="green">
        <FORM method="submit" action="Order.php"><font color="gray">  
            <center><table width="692" height="407" border="1">
        <input type="hidden" id="RecordMode" name="RecordMode" Value="<?php echo $RecordMode ?>"></br>
        <input type="hidden" id="OrderNo" name="OrderNo" Value="<?php echo $OrderNo ?>"></br>
        <tr>
            <td>&ndsp;
                <br>OrderNo:
                <input type="text" name="OrderNo" value="<?php echo $OrderNo ?>"></br>
                <br>OrderDate:
                <input type="date" name="OrderDate" value="<?php echo $OrderDate ?>"></br>
                <br>Amount:
                <input type="text" name="Amount" value="<?php echo $Amount ?>"></br></td>
                <td>
                    <input type="submit" name="Delete" value="Delete">
                </td>
                <<form>
                    <input type="button" value="cancel" onclick="history.back()"> 
                </form>
</form>
</form>
</body>
</html>

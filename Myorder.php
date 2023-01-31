 <!DOCTYPE html>
<html>
    <head>
        <?php
        $dbhost="localhost";
        $dbuser="root";
        $dbpass="";
        $db="Test";
        $conn= new mysqli($dbhost,$dbuser,$dbpass,$db);
        // check connection
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            die();
        }
    //   Assign page
        if (issset($_GET['page_no'])&& $_GET['page_no']!=""){
            $page_no = $_GET['page_no'];
       } else {
            $page_no = 1;
       }
       $total_records_per_page = 3;
       $offset  ($page_no-1) * $total_records_per_page;
       $previous_page = $page_no - 1;
       $next_page = $page_no + 1;
       $adjacents = "2";
       $result_count = mysqli_query(
        $conn,
        "SELECT COUNT(*) As total_records FROM Myorder WHERE Recordstatus= 0"
       );
    // Get Table
    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1;
    $result = mysqli_query(
        $conn,
        "SELECT a.Myorder,a.orderdate,Amount FROM Myorder WHERE a.RecordStatus = 0 LIMIT $offset, $total_records_per_page"
    );
    echo "<table border='1' cellpadding='10'>";
    echo "<tr>
    <th><font color='red'>Orderno</font></th>
    <th><font color='red'>OrderDate</font></th>
    <th><font color='red'>Amount</font></th>
   </tr>";

    ?>

<?php
while ($row = $result->fetch_assoc())

{
    echo "<tr>";
    echo '<td><b><font color="#663300">' . $row['Myorder'] . '</font></b></td>';
    echo '<td><b><font color="#663300">' . $row['OrderDate'] . '</font></b></td>';
    echo "<td><a href='orderdetail.php?Orderno=".$row['Orderno']."&RecordMode=Edit'> ".$row['Orderno']."</a></td>";
    echo '<td><b><font color="663300">' . $row['Amount'] . '</font></b></td>';
    echo"</tr>";
}
echo "</table>";
?>
<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div>
<ul class="pagination">
<?php
echo "<tr>";
?>
<?php if($page_no > 1){
echo "<td><b><a href='?page_no=1'>First Page</a></b></td>";
} ?>
    
<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
<a <?php if($page_no > 1){
echo "<td><b><a href='?page_no=$previous_page'</a></b></td>";
} ?>Previous</a>
</li>
    
<li <?php if($page_no >= $total_no_of_pages){
echo "class='disabled'";
} ?>
<a <?php if($page_no < $total_no_of_pages) {
echo "<td><b><a href='?page_no=$next_page'</a></b></td>";
} ?>Next</a>
</li>
 
<?php if($page_no < $total_no_of_pages){
echo "<a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a>";
} ?>
</ul>
<?php
if ($total_no_of_pages <= 10){   
 for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
 if ($counter == $page_no) {
 echo "<class='active'><a>$counter</a>"; 
         }else{
        echo "<td><a href='?page_no=$counter'>$counter</a></td>";
                }
        }
}

elseif ($total_no_of_pages > 10){

}

?>   
</head>    
</html>

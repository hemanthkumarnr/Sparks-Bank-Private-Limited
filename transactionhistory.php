
<!DOCTYPE html>
<html lang="en">
<head>

<title>Transaction history</title>
</head>

<style>
  
           .text{
            margin-top:30px;
             text-align:center;
             color:red;
           }
          #customers {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width:50% ;
          margin-top:50px;
          margin-left:25%;
  
          }

          #customers td, #customers th {
            
            padding: 8px;
          }

          #customers tr:nth-child(even){background-color: #f2f2f2;}

          #customers tr:hover {background-color: #ddd;}

          #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: rgb(12, 148, 91);
            color: #fff;
          }
          #customers #item{
            font-weight:bold; 
            font-family: 'Ubuntu', sans-serif;
            font-size:14px;
          }
          
        </style>
<body>
<?php
include 'header.php';
include 'main.php';
?>
<div class="text">
   <h1>Transaction History</h1>
</div>
<table id="customers">
    <tr>
        <th>Transaction ID</th>
        <th>Sender Name</th>
        <th>Receiver Name</th>
        <th>Amount</th>   
        <th>Date & Time</th>   
    </tr>
    <?php
      $sql = "select * from transfer";
      $res = mysqli_query($conn,$sql);
      while($row=mysqli_fetch_assoc($res)) {
    ?>
    <tr>
        <td style="font-weight:bold;"><?php echo $row['tran_id'];?></td>
        <td id="item"><?php echo $row['fromcustomer'];?></td>
        <td id="item"><?php echo $row['tocustomer'];?></td>
        <td style="font-weight:bold;color:green;"><i class="fas fa-rupee-sign" style="color:black;width:10px;"></i><?php echo $row['amount'];?></td>
        <td style=" font-weight:bold; color:red;"  ><?php echo $row['datetime'];?></td>           
    </tr>
    <?php
      }
    ?>
</table>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
     include 'main.php';
     ?>

        <style>
          #customers {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 80% ;
          margin-top:50px;
  
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
          #customer td ,a{
           color:black; 
          }
          #customer td,a:hover{
            color:green;
          }
        </style>
    
    
</head>
<body >

   <?php
  
   include 'header.php';
   ?>
<body>


<center>
    <div>
<table id="customers">
<tr>
<th>Customer ID</th>
<th>Customer Name</th>
<th>Customer Email</th>
<th >Balance</th>
<th>Operations</th>


</tr>
<?php 
      // $conn = mysqli_connect("localhost","root","","sparksbank");
      $sql = "select * from customer";
      $result = mysqli_query($conn,$sql);
      while($rows=mysqli_fetch_assoc($result)) {
   ?>
   <tr>
      <td style="font-weight:bold;"><?php echo $rows['cus_id'];?></td>
      <td id="item"><?php echo $rows['cus_name'];?></td>
      <td style="font-family: 'Georama', sans-serif; "><?php echo $rows['cus_gmail'];?></td>
      <td style="color:green;font-weight: bold;font-size:13px"><i class="fas fa-rupee-sign" style="color:black; width:20px;"></i><?php echo $rows['balance'];?></td>
      <td ><a href="viewprofile.php?id=<?php echo $rows['cus_id'] ;?>&fromname='<?php echo $rows['cus_name'];?>'" style=" font-weight:bold;">View Profile</a></td> 
   </tr>
   <?php
      }
   ?>
    </table>

</div>



</script>
  </body>
</html>
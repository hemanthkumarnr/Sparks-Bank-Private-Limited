<?php
include 'connect.php';
?>

<html>
<head>
<?php 
include 'main.php';
?>
<title>Customer Profile</title>
<style>
.hero {
    margin-top:100px;
  height: 60vh;
  width:100%;
  display: flex;
  flex-direction: column;
  align-items: center;

}

.profile {
    margin-top :2rem;
    text-align:center;
    line-height:3rem;
}
.table {
    width:60%;
    margin-top:3rem;
    text-align:center;
    
}
span{
    color:rgb(248, 137, 10);
    font-family: 'Lobster', cursive;
}
span1{
    color:green;
    font-family: 'Lobster', cursive;
}
h3{
    color:black;
    font-family:'Ubantu', cursive;
}
        #customers {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 50% ;
          margin-top:50px;
  
          }

          #customers td, #customers th {
            
            padding: 8px;
          }

          #customers tr:nth-child(odd){background-color: #f2f2f2;}

          #customers tr:hover {background-color: #ddd;}

          #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
    background-color:dark gray;
            
            color: #000;
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

<body>
<?php
include 'header.php';
?>
<div class="hero">
<div >
<i class="fas fa-user-alt fa-6x"></i>
</div>
<div class="profile">
<?php 
//$conn = mysqli_connect("localhost","root","","sparksbank");
    $c_id = $_GET['id'];
    $sql = "select * from customer where cus_id=$c_id";
    $result = mysqli_query($conn,$sql);
      while($rows=mysqli_fetch_assoc($result)){
?>
    <h3 >Name: <span> <?php echo $rows['cus_name'];?> </span></h3>
    <h3>Email: <span><?php  echo $rows['cus_gmail'];?></span></h3>
    <h3>Current Balance: <i class="fas fa-rupee-sign" ></i><span1><?php echo $rows['balance'];?></span1></h3>
<?php
}
?>
</div>

<div class="table">
<h1 class="name">Recent Transactions</h1>
</div>
<table id="customers">
    <tr>
        <th>Receiver</th>
        <th>Amount</th>   
        <th>Date & Time</th>   
    </tr>
    <?php
      $fromname = $_GET['fromname'];
      $sql = "select * from transfer where fromcustomer=$fromname";
      $res = mysqli_query($conn,$sql);
      while($rows=mysqli_fetch_assoc($res)) {
    ?>
    <tr>
        <td  style="font-weight:bold; color:blue;"> <?php echo $rows['tocustomer'];?></td>
        <td style="color:green;font-weight: bold;font-size:13px"><i class="fas fa-rupee-sign" style="color:black; width:20px;"></i><?php echo $rows['amount'];?></td>
        <td style="color:rgb(236, 61, 120); font-weight:bold;"><?php echo $rows['datetime'];?></td>
    </tr>
    <?php
      }
    ?>


</body>
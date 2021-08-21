<!DOCTYPE html>
<html lang="en">
<head>

  <title>Selected Customer</title>
  <style>
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
    #customer td ,a{
     color:black; 
    }
    #customer td,a:hover{
      color:green;
    }
    .form{
      margin-top :20px;
      text-align: center;
    }
    .result {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 6.5rem;
  padding-top: 2rem;
  text-align: center;
  text-transform: capitalize;
  background-color: rgb(216, 74, 74);
}
.success {
  background-color: rgb(109, 177, 109);
}
#view {
  background-color: blue;
  color: white;
  text-decoration: none;
  padding: 8px;
  border-radius: 8px;
}
i {
  font-size: 1rem;
  margin-right: 0.2rem;
}

form {
  width: 50%;
  display: flex;
  flex-direction: column;
  margin: 3rem auto 0 auto;
  padding: 2rem;
  font-size: 1.2rem;
  border-radius: 10px;
}
input,
select {
  margin-bottom: 2rem;
  height: 2.5rem;
  outline: none;
  padding-left: 10px;
  text-transform: capitalize;
  font-size: 1.1rem;
  border: 2px solid grey;
  caret-color: blue;
}
button {
  height: 3rem;
  width: 110px;
  align-self: center;
  cursor: pointer;
  border-radius: 5px;
  font-size: 1.2rem;
  background-color: light gray;
  color: black;
  font-weight:bold;
  border: none;
}
button:hover
{
  background-color: green;
  color: #fff;
  transition: 0.5s;
}
  </style>
<?php
include 'main.php';
include 'header.php';
?>

</head>

<body>

<table id="customers">
       <tr>
           <th>Cus_id</th>
           <th>Cus_name</th>
           <th>Cus_email</th>
           <th>balance</th>      
        </tr>
        <?php
           $cid = $_GET['cuid'];
           $sql = "select * from customer where cus_id=$cid";
           
           $res = mysqli_query($conn,$sql);
           while($rows=mysqli_fetch_assoc($res)) {
        ?>
        <tr>
          <td style="font-weight:bold;"><?php echo $rows['cus_id'];?></td>
          <td id="item"class="name"><?php echo $rows['cus_name'];?></td>
          <td  style="font-family: 'Georama', sans-serif; "><?php echo $rows['cus_gmail'];?></td>
          <td style="color:green;font-weight: bold;font-size:13px"><i class="fas fa-rupee-sign" style="color:black; width:20px;"></i><?php echo $rows['balance'];?></td>
        </tr>
        <?php
           }
        ?>
    </table>
    <form action="" method="post" class="form">
    <label for="to">Select the customer</label>
    <select name="to" required>
       <option value="" selected disabled>choose customer</option>
      <?php
         $cid = $_GET['cuid'];
         $sql = "select * from customer where cus_id!=$cid";
         $res = mysqli_query($conn,$sql);
         while($row = mysqli_fetch_assoc($res)) {
        ?>
       <option value="<?php echo $row['cus_id'];?>"><?php echo $row['cus_id'];?> - <?php echo $row['cus_name']; ?> - <?php echo $row['balance']?></option>
      <?php
         }
        ?>
    </select>
    <br>
    <br>
    <input type="number" name="amount" placeholder="enter amount" required>
    <br><br>
    <button name="submit">Transfer</button>
    </form>

<?php

if(isset($_POST['submit'])) {
    $from = $_GET["cuid"];
    $to = $_POST["to"];
    $amount = $_POST["amount"];
    $sql = "select * from customer where cus_id=$from";
    $res = mysqli_query($conn,$sql);
    $fromcustomer = mysqli_fetch_array($res);
    
    $sql = "select * from customer where cus_id=$to";
    $res = mysqli_query($conn,$sql);
    $tocustomer = mysqli_fetch_array($res);
    
    if($amount < 0) {
   ?>
   <div class="result">
   <h1><?php echo "negative value can't  be Transfered";?></h1>
   </div>
   <?php
    } else if($amount == 0) {
    ?>
    <div class="result">
   <h1><?php echo "amount can't be zero fill something";?></h1>
   </div>
  <?php
    } else if($amount > $fromcustomer['balance']) {
    ?>
        <div class="result">
          <h1><?php echo "Oops! Amount is Larger than current balance";?></h1>
        </div>
    <?php
    } else {
         $updateamount = $fromcustomer['balance'] - $amount;
         $sql = "UPDATE customer set balance=$updateamount where cus_id=$from";
         mysqli_query($conn,$sql);
        
         $updateamount = $tocustomer['balance'] + $amount;
         $sql = "UPDATE customer set balance=$updateamount where cus_id=$to";
         mysqli_query($conn,$sql);
        
        $sender = $fromcustomer['cus_name'];
        $receiver = $tocustomer['cus_name'];
        $sql = "insert into `transfer` ( `fromcustomer`, `tocustomer`, `amount`, `datetime`) values 
        ( '$sender', '$receiver', '$amount', current_timestamp())";
        $res = mysqli_query($conn,$sql);
        if($res) {
       ?>
       <div class="result success">
          <h1><?php echo "Transfered Successfully!";?></h1>
        </div>
    <?php
        echo "<script>
              function change() {
                  window.location='transactionhistory.php';
              }
              setTimeout(change,700);
              </script>";
        }
        $updateamount= 0;
        $amount = 0;
    }
}
    
?>

</body>
</html>
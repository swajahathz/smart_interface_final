<?php
$servername = "103.161.48.86";
$username   = "root";
$password   = "W@j@H@t#@@7";
$database   = "billing";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("❌ Connection failed: " . mysqli_connect_error());
}

$user_id = $_GET['id'];




if(isset($_GET['block'])){
    $billing_id = $_GET['id'];
    mysqli_query($conn,"UPDATE home_user_code SET `block` = 1 WHERE name = '$billing_id'");
    header('Location: user_info.php?id='.$billing_id);
}
if(isset($_GET['billing_active'])){
    $billing_id = $_GET['id'];
    mysqli_query($conn,"UPDATE home_user_code SET `block` = 0 WHERE name = '$billing_id'");
    header('Location: user_info.php?id='.$billing_id);
}




if(isset($_POST['am_update'])){
    $am = $_POST['amount'];
    $idd = $_POST['id'];


    $due_date = date('Y-m-10');
    $create_date = date('Y-m-d');

    mysqli_query($conn,"INSERT INTO nonpaid_invoices_home_user (name,bill_status,due_date,amount,invoice_create_date,create_by,days) VALUES ('$idd',0,'$due_date','$am',NOW(),'Software','Custom Invoice')");

    // FIND LAST ID
    $f_last_id2 = mysqli_query($conn,"SELECT * FROM nonpaid_invoices_home_user WHERE name = '$idd' ORDER BY inv_id DESC limit 1");
    $f_last_id2_r = mysqli_fetch_assoc($f_last_id2);
    $last_inv_id = $f_last_id2_r['inv_id'];

    mysqli_query($conn,"UPDATE home_user_code SET amount = '$am',last_inv_id='$last_inv_id' WHERE name = '$idd'");

    header('Location: user_info.php?id='.$idd);
}


if(isset($_POST['sync'])){

    $name = $_POST['id'];
    
    //Check duplicate
    $user_inv = mysqli_query($conn,"SELECT * FROM home_user_code WHERE name = '$name'");
    $count2 = mysqli_num_rows($user_inv);

    if($count2 > 0){
        echo $name." Already<br>";
         header('Location: user_info.php?id='.$name);
    }else{
       mysqli_query($conn,"INSERT INTO home_user_code (name,bill_status,due_date,amount,invoice_create_date,create_by)VALUES('$name',0,NOW(),0,NOW(),'admin')");
        header('Location: user_info.php?id='.$name);
    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Table</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }

    .table-container {
      width: 100%;
      overflow-x: auto; /* Enables horizontal scroll on small screens */
      border: 1px solid #ddd;
      border-radius: 8px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      min-width: 600px;
    }

    th, td {
      text-align: left;
      padding: 10px;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #007bff;
      color: white;
    }

    tr:hover {
      background-color: #f1f1f1;
    }
    
        .info-card {
      border-radius: 15px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      transition: all 0.3s ease;
    }
    .info-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 15px rgba(0,0,0,0.15);
    }
    .card-icon {
      font-size: 40px;
      opacity: 0.3;
    }
  </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

  <div class="container mb-4 mt-4">
    <div class="row g-3">
      
      <!-- User Serial Card -->
      <div class="col-md-6">
        <div class="card info-card text-center p-3">
          <div class="card-body">
            <h5 class="card-title text-primary">1 Bill ID</h5>
            <div class="card-text fs-3 fw-bold" id="userSerial">
            
            <?php 
            $billing_info = mysqli_query($conn, "SELECT inv_id, amount, block FROM home_user_code WHERE name = '$user_id'");

// Check if query executed successfully
if ($billing_info && mysqli_num_rows($billing_info) > 0) {
    $billing_info_r = mysqli_fetch_assoc($billing_info);

    // Safely get inv_id (handle null)
    $inv_id = !empty($billing_info_r['inv_id']) ? $billing_info_r['inv_id'] : '0000';

    echo "101030" . $inv_id;
} else {
    // No record found or query failed
    echo "Record Not Found"; // fallback value
}
            
     
           if ($billing_info && mysqli_num_rows($billing_info) > 0) { ?>
            
            <form action="" method="GET">
                                                                    <input type="hidden" name="id" value="<?php echo $user_id; ?>" readonly/>
                                                                    <?php

                                                                    if($billing_info_r['block'] == 1){
                                                                         echo ' <button class="btn btn-danger btn-sm" name="billing_active">Block</button>';
                                                                    }else{
                                                                         echo ' <button class="btn btn-success btn-sm" name="block">Active</button>';
                                                                    }
                                                                    ?>

                                                                    </form> <?php } ?></div>
                                                                    
                                                                    
          </div>
        </div>
      </div>

      <!-- Pending Amount Card -->
      <div class="col-md-6">
        <div class="card info-card text-center p-3">
          <div class="card-body">
            <h5 class="card-title text-danger">Pending Amount</h5>
            <?php if ($billing_info && mysqli_num_rows($billing_info) > 0) { ?>
            <div class="card-text fs-3 fw-bold" id="pendingAmount">₨ <?php echo number_format($billing_info_r['amount']); ?></div>
            <form action="#" method="POST">
                            <div class="d-flex" style="justify-content: center;">
                                               <div> <input class="form-control" type="number" name="amount" placeholder="Type Amount" />
                                                <input type="hidden" name="id" value="<?php echo $user_id; ?>"/></div>
                                                <div><button class="btn btn-danger" name="am_update">Submit</button></div>
                                                </div>
                                                        </form>
                                                        <?php }else{
                                                            
                                                            
                                                            echo '<form action="#" method="POST"><input name="id" type="text" value="'.$user_id.'" readonly/><button class="btn btn-danger btn-sm" name="sync">Sync New Account</button></form>';
                                                            
                                                        }
                                                        ?>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="table-container">
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Amount</th>
          <th>Days</th>
          <th>Create Date</th>
           <th>Due Date</th>
            <th>Pay Date</th>
             <th>Create by</th>
              <th>Status</th>
        </tr>
      </thead>
      <tbody>
          <?php
          $count = 1;
          
$billing_invoice = mysqli_query($conn,"SELECT * FROM nonpaid_invoices_home_user WHERE name = '$user_id' order by inv_id DESC");
while($row = mysqli_fetch_array($billing_invoice)){
   
?>
        <tr>
          <td><?php echo $count++; ?></td>
          <td><?php echo $row['name'] ?></td>
          <td><?php echo $row['amount'] ?></td>
          <td><?php echo $row['days'] ?></td>
          <td><?php echo $row['invoice_create_date'] ?></td>
          <td><?php echo $row['due_date'] ?></td>
          <td><?php echo $row['invoice_paid_date'] ?></td>
          <td><?php echo $row['create_by'] ?></td>
          <td><?php
          
          if($row['bill_status'] == 1){
              echo '<button>Paid</button>';
          }else{
              echo '<button>Non Paid</button>'; } ?></td>
        </tr>
        <?php  } ?>
      </tbody>
    </table>
  </div>

</body>
</html>

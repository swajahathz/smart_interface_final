<?php

//JAZZ CASH Configuration
define('JAZZCASH_MERCHANT_ID', 'Merchant ID');
define('JAZZCASH_PASSWORD', 'Merchant Password');
define('JAZZCASH_INTEGERITY_SALT', 'Integerity Salt');
define('JAZZCASH_RETURN_URL', 'https://portal.citylinkscommunications.com/jazzcash_form');
define('JAZZCASH_CURRENCY_CODE', 'PKR');
define('JAZZCASH_LANGUAGE', 'EN');
define('JAZZCASH_API_VERSION_2', '2.0');
define('JAZZCASH_HTTP_POST_URL', 'https://payments.jazzcash.com.pk/CustomerPortal/transactionmanagement/merchantform/');
define('BASE_URL','https://gnsol.in/jazz/');



$tranId = substr(time() . mt_rand(1000, 9999), -8);

//============================Get Form Values=========================================================
$packagePrice = $subscriber_info[0]['totalPrice'] - $subscriber[0]['discount'] + $subscriber[0]['extra_charges'];
//============================Get EForm Values=========================================================


//=============================JazzCash API Configurations=============================================
$pp_Amount = $packagePrice * 100;


$MerchantID = "65545014"; //Your Merchant from transaction Credentials
$Password = "xzcf4uyz8s"; //Your Password from transaction Credentials
$HashKey = "9t69y5x007"; //Your HashKey/integrity salt from transaction Credentials
$ReturnURL = "https://gnsol.in/jazz/return.php"; //Your Return URL, It must be static



// $MerchantID = "44555745"; //Your Merchant from transaction Credentials
// $Password = "8ww61201ze"; //Your Password from transaction Credentials
// $HashKey = "x8w03t2du2"; //Your HashKey/integrity salt from transaction Credentials
// $ReturnURL = "https://portal.citylinkscommunications.com/jazzcash_form"; //Your Return URL, It must be static




date_default_timezone_set("Asia/karachi");

$Amount = $pp_Amount; //Last two digits will be considered as Decimal thats the reason we are multiplying amount with 100 in line number 11
$BillReference = $tranId.$subscriber[0]['username']; //use AlphaNumeric only
$Description = "JazzCash"; //use AlphaNumeric only
$IsRegisteredCustomer = "No"; // do not change it
$Language = JAZZCASH_LANGUAGE; // do not change it
$TxnCurrency = JAZZCASH_CURRENCY_CODE; // do not change it
$TxnDateTime = date('YmdHis');
$TxnExpiryDateTime = date('YmdHis', strtotime('+1 Days'));
$TxnRefNumber = 'EHB'.date('YmdHis') . mt_rand(10, 100);
$TxnType = ""; // Leave it empty
$Version = JAZZCASH_API_VERSION_2;
$SubMerchantID = ""; // Leave it empty
$BankID = ""; // Leave it empty
$ProductID = ""; // Leave it empty
$ppmpf_1 = ""; // use to store extra details (use AlphaNumeric only)
$ppmpf_2 = ""; // use to store extra details (use AlphaNumeric only)
$ppmpf_3 = ""; // use to store extra details (use AlphaNumeric only)
$ppmpf_4 = ""; // use to store extra details (use AlphaNumeric only)
$ppmpf_5 = ""; // use to store extra details (use AlphaNumeric only)

//========================================Hash Array for making Secure Hash for API call================================
$HashArray = [$Amount, $BankID, $BillReference, $Description, $IsRegisteredCustomer,
    $Language, $MerchantID, $Password, $ProductID, $ReturnURL, $TxnCurrency, $TxnDateTime,
    $TxnExpiryDateTime, $TxnRefNumber, $TxnType, $Version, $ppmpf_1, $ppmpf_2, $ppmpf_3,
    $ppmpf_4, $ppmpf_5];

$SortedArray = $HashKey;
for ($i = 0; $i < count($HashArray); $i++) {
    if ($HashArray[$i] != 'undefined' and $HashArray[$i] != null and $HashArray[$i] != "") {
        $SortedArray .= "&" . $HashArray[$i];
    }
}
$Securehash = hash_hmac('sha256', $SortedArray, $HashKey);
//========================================Hash Array for making Secure Hash for API call================================



?>
<!doctype html>
<html lang="ur" dir="ltr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Profile & Payments</title>
  <style>
    :root{--bg:#f6f8fb;--card:#ffffff;--muted:#6b7280;--accent:#0ea5a4;--danger:#ef4444}
    *{box-sizing:border-box}
    body{font-family:Inter, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial; margin:0; background:var(--bg); color:#0f172a}
    .container{max-width:980px;margin:28px auto;padding:20px}
    .card{background:var(--card);border-radius:12px;padding:18px;box-shadow:0 6px 18px rgba(12,18,30,0.06);}
    .grid{display:grid;grid-template-columns:repeat(2,1fr);gap:14px}
    label{display:block;font-size:13px;color:var(--muted);margin-bottom:6px}
    input, textarea{width:100%;padding:10px;border:1px solid #e6e9ee;border-radius:8px;font-size:14px}
    textarea{min-height:72px;resize:vertical}
    .row{display:flex;gap:12px}
    .actions{display:flex;justify-content:flex-end;gap:10px;margin-top:12px}
    .btn{padding:10px 14px;border-radius:10px;border:0;cursor:pointer;font-weight:600}
    .btn-primary{background:var(--accent);color:white}
    .btn-danger{background:red;color:white}
    .btn-outline{background:transparent;border:1px solid #cbd5e1;color:var(--muted)}
    h2{margin:0 0 12px 0}
    .profile-head{display:flex;align-items:center;gap:14px}
    .avatar{width:72px;height:72px;border-radius:12px;background:linear-gradient(135deg,#e0f2f1,#bdebec);display:flex;align-items:center;justify-content:center;font-weight:700;color:#065f5c}
    .muted{color:var(--muted);font-size:13px}
    table{width:100%;border-collapse:collapse;margin-top:14px}
    th,td{padding:10px 12px;border-bottom:1px solid #eef2f7;text-align:left}
    th{background:#fbfdff;font-weight:700;font-size:13px}
    .status-paid{color:green;font-weight:600}
    .status-pending{color:orange;font-weight:600}
    .status-failed{color:var(--danger);font-weight:600}
    @media (max-width:720px){.grid{grid-template-columns:1fr}.actions{flex-direction:column-reverse;align-items:stretch}}
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="profile-head" style="    display: flex
;
    justify-content: space-between;
    background-color: #8080801a;
    padding: 20px;
    border-radius: 5px;">
        <div>
          <h2>{{ ucwords($subscriber[0]['firstname'] . ' ' . $subscriber[0]['lastname']) }}</h2>

          <div class="muted">UserID: {{$subscriber[0]['username']}}</div>
          <div class="muted">Transaction ID: {{$tranId}}</div>
          <div style="margin-top:5px; color: {{ $subscriber[0]['status'] == 'expired' ? 'red' : 'green' }}">
    Status: {{ ucwords($subscriber[0]['status']) }}
</div>
        </div>
        <div>
            <h2>{{$subscriber_info[0]['totalPrice'] - $subscriber[0]['discount'] + $subscriber[0]['extra_charges']}}</h2>
   
        <input type="hidden" name="pp_Version" value="<?php echo $Version; ?>" />
        <input type="hidden" name="pp_TxnType" placeholder="TxnType" value="<?php echo $TxnType; ?>" />
        <input type="hidden" name="pp_Language" value="<?php echo $Language; ?>" />
        <input type="hidden" name="pp_MerchantID" value="<?php echo $MerchantID; ?>" />
        <input type="hidden" name="pp_SubMerchantID" value="<?php echo $SubMerchantID; ?>" />
        <input type="hidden" name="pp_Password" value="<?php echo $Password; ?>" />
        <input type="hidden" name="pp_TxnRefNo" value="<?php echo $TxnRefNumber; ?>" />
        <input type="hidden" name="pp_Amount" value="<?php echo $Amount; ?>" />
        <input type="hidden" name="pp_TxnCurrency" value="<?php echo $TxnCurrency; ?>" />
        <input type="hidden" name="pp_TxnDateTime" value="<?php echo $TxnDateTime; ?>" />
        <input type="hidden" name="pp_BillReference" value="<?php echo $BillReference ?>" />
        <input type="hidden" name="pp_Description" value="<?php echo $Description; ?>" />
        <input type="hidden" name="pp_IsRegisteredCustomer" value="<?php echo $IsRegisteredCustomer; ?>" />
        <input type="hidden" id="pp_BankID" name="pp_BankID" value="<?php echo $BankID ?>">
        <input type="hidden" id="pp_ProductID" name="pp_ProductID" value="<?php echo $ProductID ?>">
        <input type="hidden" name="pp_TxnExpiryDateTime" value="<?php echo $TxnExpiryDateTime; ?>" />
        <input type="hidden" name="pp_ReturnURL" value="<?php echo $ReturnURL; ?>" />
        <input type="hidden" name="pp_SecureHash" value="<?php echo $Securehash; ?>" />
        <input type="hidden" name="ppmpf_1" placeholder="ppmpf_1" value="<?php echo $ppmpf_1; ?>" />
        <input type="hidden" name="ppmpf_2" placeholder="ppmpf_2" value="<?php echo $ppmpf_2; ?>" />
        <input type="hidden" name="ppmpf_3" placeholder="ppmpf_3" value="<?php echo $ppmpf_3; ?>" />
        <input type="hidden" name="ppmpf_4" placeholder="ppmpf_4" value="<?php echo $ppmpf_4; ?>" />
        <input type="hidden" name="ppmpf_5" placeholder="ppmpf_5" value="<?php echo $ppmpf_5; ?>" />
        
        
            <button class="btn btn-danger" type="submit" id="payvia">Pay Via JazzCash</button>
            
           
        </div>
         
      </div>
      
      <div class="card" >
          
        <div style="text-align:center;">
          <!-- Countdown display -->
<p id="counterArea" style="display:none;">
  Processing... please wait <span id="counter">30</span> seconds ⏳
</p>

<!-- Optional loader -->
<div id="loader" style="display:none;">
  <p>Loading...</p>
</div>
 </div>         
          <div style="width:400px; margin:auto;display:none;" id="form_jazz">
        <label  style="margin-top:10px;">Mobile Account Number:</label>
          <input id="jazzmobile" name="jazzmobile" type="number" placeholder="Type JazzCash mobile Number"/>
          <button id="jazzcashSubmit" class="btn btn-danger" style="margin-top:10px; margin-bottom:20px; width: 100%;">Submit</button>
          </div>
          
      </div>

      <form id="profileForm" style="margin-top:12px">
        <div class="grid">
          <div>
            <label for="userid">User ID</label>
            <input id="userid" name="userid" type="text" readonly value="{{$subscriber[0]['username']}}"  disabled=""/>
          </div>
          <div>
            <label for="amount">Current Expiration</label>
            <input id="amount" name="amount" type="text" readonly value="{{$subscriber[0]['expiration']}}"   disabled=""/>
          </div>

          <div>
            <label for="firstname">First name</label>
            <input id="firstname" name="firstname" type="text" value="{{$subscriber[0]['firstname']}}"   disabled=""/>
          </div>

          <div>
            <label for="lastname">Last name</label>
            <input id="lastname" name="lastname" type="text" value="{{$subscriber[0]['lastname']}}"   disabled=""/>
          </div>

          <div style="grid-column:1/3">
            <label for="cnic">CNIC</label>
            <input id="cnic" name="cnic" type="text" placeholder="XXXXX-XXXXXXX-X" value="{{$subscriber[0]['cnic']}}"   disabled=""/>
          </div>

          <div style="grid-column:1/3">
            <label for="address">Address</label>
            <textarea id="address" name="address"   disabled="">{{$subscriber[0]['username']}}</textarea>
          </div>

          <div>
            <label for="mobile">Mobile</label>
            <input id="mobile" name="mobile" type="text" value="{{$subscriber[0]['mobile']}}"   disabled=""/>
          </div>
           <div>
            <label for="mobile">Phone</label>
            <input id="mobile" name="mobile" type="text" value="{{$subscriber[0]['phone']}}"   disabled=""/>
        </div>
      </form>
    </div>

    <div class="card" style="margin-top:16px; background-color:#ededed;">
      <h3 style="margin-bottom:8px">Payment History</h3>
      <div class="muted">Recent payments and their status</div>

      <div style="overflow-x:auto; width:100%;">
  <table id="paymentsTable" aria-label="Payments list" style="width:100%; border-collapse: collapse;">
    <thead style="background:#f5f5f5;">
      <tr>
        <th style="padding:8px; text-align:left;">TID</th>
        <th style="padding:8px; text-align:left;">Date</th>
        <th style="padding:8px; text-align:left;">Expiration</th>
        <th style="padding:8px; text-align:left;">Package</th>
        <th style="padding:8px; text-align:left;">Amount</th>
        <th style="padding:8px; text-align:left;">Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($invoice as $sub)
        <tr>
          <td style="padding:8px;">{{ $sub['tranID'] ?? '-' }}</td>
          <td style="padding:8px;">{{ $sub['renewDate'] ?? '-' }}</td>
          <td style="padding:8px;">{{ $sub['newExpirationDate'] ?? '-' }}</td>
          <td style="padding:8px;">{{ $sub['srvname'] ?? '-' }}</td>
          <td style="padding:8px;">{{ $sub['ownerPrice'] ?? '-' }}</td>
          <td style="padding:8px; color:green;">PAID</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
  <script>
  
$("#payvia").on('click',function(){
   
   
   
   $("#form_jazz").show();
    
});
  
$("#jazzcashSubmit").on('click', function () {
    
    $("#form_jazz").hide();
    
     // Show countdown + loader
  let timeLeft = 30;
  $("#counterArea").show();
  $("#loader").show();
  $("#counter").text(timeLeft);

  // Start countdown timer
  const countdown = setInterval(() => {
    timeLeft--;
    $("#counter").text(timeLeft);

    if (timeLeft <= 0) {
      clearInterval(countdown);
      $("#loader").hide();
      $("#counterArea").text("⏰ Time out! Please try again.");
    }
  }, 1000); // 1 second per tick
  
  
  
  
    let jazzmobile = $("#jazzmobile").val();
        
    let amount = "<?php echo $pp_Amount; ?>";

    let merchantID = "44555745";
    let password = "8ww61201ze";
    let salt = "x8w03t2du2";
    let url = "https://radiusapi.atozsofts.com/api/cardrechargejazzcash/";
    let user = "<?php echo $subscriber[0]['username']; ?>";
    // JSON data object

    
    $.ajax({
              url: "https://jazzcashmerchantapi.smartispsolutions.net/api.php",
              type: "POST",
              data: {jazzmobile:jazzmobile,amount:amount,merchantID:merchantID,password:password,salt:salt,url:url,user:user},
              dataType: "json",
              success: function (data) {
                clearInterval(countdown);
                 $("#loader").hide();
                 
                 
                 console.log(data);
                if(data.response.pp_ResponseCode === "999"){
                    window.location.href = "https://portal.citylinksnetwork.com/jazz_status/0/1000/546848";
                }
                if(data.response.pp_ResponseCode === "000"){
                    window.location.href = "https://portal.citylinksnetwork.com/jazz_status/1/1000/546848";
                }
                
              },
              error: function (xhr, status, error) {
                 clearInterval(countdown);
                  $("#loader").hide();
                //   window.location.href = "https://radius.atozsofts.com/jazz_status/0/1000/546848";
              }
            });
    
    
    
});


  </script>

</body>
</html>

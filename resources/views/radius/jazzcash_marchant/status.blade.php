<!doctype html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Payment Status</title>
  <style>
    :root{ --bg:#f5f7fb; --card:#ffffff; --success:#1e9b59; --error:#e53e3e; --muted:#6b7280 }
    *{box-sizing:border-box}
    body{font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; background:var(--bg); margin:0; padding:40px; display:flex; align-items:center; justify-content:center; min-height:100vh}
    .container{width:100%; max-width:720px}
    .card{background:var(--card); border-radius:12px; box-shadow:0 6px 20px rgba(25,30,40,0.06); padding:28px; text-align:center}

    .icon{width:96px;height:96px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:44px;color:white;margin-bottom:18px}
    .success .icon{background:linear-gradient(135deg,#2dd4bf,#059669)}
    .error .icon{background:linear-gradient(135deg,#fb7185,#ef4444)}

    h1{margin:6px 0 8px;font-size:20px}
    p{color:var(--muted); margin:0 0 18px}

    .details{display:flex;gap:10px;flex-wrap:wrap;justify-content:center;margin-top:12px}
    .chip{background:#f1f5f9;padding:8px 12px;border-radius:999px;font-size:13px;color:#111827}

    .controls{display:flex;gap:8px;justify-content:center;margin-top:18px}
    button{padding:10px 14px;border-radius:8px;border:0;background:#111827;color:#fff;cursor:pointer}
    button.secondary{background:#6b7280}

    /* Responsive tweaks */
    @media (max-width:480px){body{padding:18px}.card{padding:18px}}
  </style>
</head>
<body>
  <div class="container">
    <div id="card" class="card">
      <!-- Content inserted by JS -->
    </div>

   
  </div>

  <script>
    // ---------- control variable ----------
    // If you prefer to change inside the file, set `status` to 1 or 0
    // 1 = success, 0 = failed
    let status = '{{$status}}'; // <-- change here (1 or 0)

    // Also reads ?status= from URL for easy testing
    const urlParam = new URLSearchParams(window.location.search).get('status');
    if (urlParam !== null) {
      const n = parseInt(urlParam, 10);
      if (!Number.isNaN(n)) status = n;
    }

    const card = document.getElementById('card');

    function render() {
      if (Number(status) === 1) {
        card.className = 'card success';
        card.innerHTML = `
          <div class="icon">✓</div>
          <h1>Payment Successful</h1>
          <p>Your user account has been recharged. Thank you for your payment!</p>
          <div class="details">
            <div class="chip">TID: <strong id="tid">#${generateTid()}</strong></div>
            <div class="chip">Amount: <strong id="amount">Rs. {{$amount / 100}}</strong></div>
            <div class="chip">Date: <strong id="date">${new Date().toLocaleString()}</strong></div>
          </div>
        `;
      } else {
        card.className = 'card error';
        card.innerHTML = `
          <div class="icon">✕</div>
          <h1>Payment Unsuccessful</h1>
          <p>Your transaction was cancelled. Please try again or contact support.</p>
          <div class="details">
            <div class="chip">TID: <strong id="tid">#${generateTid()}</strong></div>
            <div class="chip">Status: <strong>Cancelled</strong></div>
            <div class="chip">Date: <strong id="date">${new Date().toLocaleString()}</strong></div>
          </div>
        `;
      }
    }

    function generateTid() {
      // 8 digit numeric transaction id
      return '{{$pp_BillReference}}';
    }

    function setStatus(v) {
      status = v;
      // update URL for easier sharing/testing
      const u = new URL(window.location);
      u.searchParams.set('status', String(Number(status)));
      window.history.replaceState({}, '', u);
      render();
    }

    function retry() {
      // example placeholder — here you could call your real payment retry flow
      alert('Retrying... (demo only)');
    }

    function goToDashboard() {
      // example redirect — replace with your site/dashboard URL
      alert('Redirecting to dashboard — replace this with a real redirect.');
    }

    // initial render
    render();
  </script>
</body>
</html>

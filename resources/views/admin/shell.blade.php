<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>PayGate • Admin</title>
  <style>
    :root{ --bg:#f6f7fb; --card:#fff; --ink:#0f223f; }
    *{ box-sizing:border-box }
    body{ margin:0; background:var(--bg); font-family:ui-sans-serif,system-ui,Segoe UI,Roboto }
    header{ display:flex; justify-content:space-between; align-items:center; padding:14px 18px; background:#fff; border-bottom:1px solid #e5e7eb }
    .container{ max-width:960px; margin:24px auto; padding:0 16px }
    .card{ background:var(--card); border:1px solid #e5e7eb; border-radius:12px; padding:18px }
    .btn{ border:1px solid #cbd5e1; background:#fff; border-radius:10px; padding:8px 12px }
  </style>
</head>
<body>
  <header>
    <div><strong>PayGate Admin</strong></div>
    <form method="POST" action="{{ route('admin.logout') }}">
      @csrf
      <button class="btn" type="submit">Logout</button>
    </form>
  </header>

  <div class="container">
    @yield('content')
  </div>
</body>
</html>

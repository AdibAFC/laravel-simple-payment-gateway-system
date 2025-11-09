<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Login • PayGate</title>
  <style>
    :root{ --bg:#0e2244; --card:#fff; --ink:#0e2244; --muted:#6b7280; }
    *{ box-sizing:border-box }
    body{ margin:0; min-height:100vh; display:grid; place-items:center; background:var(--bg);
          font-family:ui-sans-serif,system-ui,Segoe UI,Roboto,Helvetica,Arial; color:#111827 }
    .card{ width:100%; max-width:420px; background:var(--card); border-radius:14px;
           padding:26px 28px; box-shadow:0 12px 40px rgba(0,0,0,.22) }
    h1{ margin:0 0 16px; text-align:center; font-size:26px; font-weight:800; color:var(--ink) }
    label{ display:block; font-size:12px; color:#374151; margin-top:10px }
    input{ width:100%; padding:12px 12px; border:1px solid #d1d5db; border-radius:10px; margin-top:6px }
    .btn{ margin-top:16px; width:100%; border:none; border-radius:10px; padding:12px 16px;
          background:#0f223f; color:#fff; font-weight:700; }
    .btn:hover{ opacity:.96 }
    .muted{ margin-top:12px; text-align:center; color:var(--muted); font-size:14px }
    a{ color:#0f223f; text-decoration:none; font-weight:600 }
    .alert{ background:#fee2e2; color:#991b1b; border:1px solid #fecaca; padding:10px 12px; border-radius:10px; margin-bottom:12px }
  </style>
</head>
<body>
  <main class="card">
    <h1>Welcome Back</h1>

    @if ($errors->any())
      <div class="alert">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('admin.login.post') }}">
      @csrf

      <label>Email</label>
      <input type="email" name="email" value="{{ old('email') }}" required autofocus>

      <label>Password</label>
      <input type="password" name="password" required>

      <button class="btn" type="submit">Login</button>
    </form>

    <p class="muted">
      Don’t have an account?
      <a href="{{ route('admin.register') }}">Register here</a>
    </p>
  </main>
</body>
</html>

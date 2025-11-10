<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>{{ config('app.name') }} • Admin</title>
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
  @stack('styles')
  <!-- <style>
    :root{
      --bg:#f6f7fb; --card:#fff; --ink:#0f223f;
      --side:#0b1220; --side-muted:#111827; --text:#e5e7eb; --hover:#1f2937;
    }
    *{ box-sizing:border-box }
    body{ margin:0; background:var(--bg); font-family:ui-sans-serif,system-ui,Segoe UI,Roboto }

    header{ display:flex; justify-content:space-between; align-items:center;
      padding:14px 18px; background:#fff; border-bottom:1px solid #e5e7eb }

    .btn{ border:1px solid #cbd5e1; background:#fff; border-radius:10px; padding:8px 12px; cursor:pointer }

    /* layout with left sidebar */
    .layout{ display:grid; grid-template-columns:240px 1fr; min-height:calc(100vh - 54px); }
    aside{ background:var(--side); color:var(--text); padding:18px 14px; display:flex; flex-direction:column; gap:10px }
    .brand{ font-weight:800; font-size:18px; padding:10px 12px; border-radius:10px; background:var(--side-muted); margin-bottom:8px }
    .nav a{ display:flex; justify-content:space-between; align-items:center; gap:8px;
      text-decoration:none; color:var(--text); padding:10px 12px; border-radius:10px }
    .nav a:hover{ background:var(--hover) }
    .nav a.active{ background:#ffffff14; box-shadow:inset 0 0 0 1px #ffffff22 }
    .count{ opacity:.7; font-size:12px }

    main{ padding:24px 28px }
    .container{ max-width:960px; margin:0 auto }
    .card{ background:var(--card); border:1px solid #e5e7eb; border-radius:12px; padding:18px }

    /* responsive: sidebar -> top bar */
    @media (max-width: 900px){
      .layout{ grid-template-columns:1fr }
      aside{ position:sticky; top:0; z-index:20; flex-direction:row; align-items:center; gap:8px }
      .brand{ display:none }
      .nav{ display:flex; gap:8px }
    }
  </style> -->
</head>
<body>
  @include('admin.partials.header')

  @php $activeTab = request('tab','banks'); @endphp

  <div class="layout">
    <!-- Sidebar -->
    <aside>
      <div class="brand">{{ config('app.name') }}</div>
      <nav class="nav">
        <a href="{{ route('admin.dashboard', ['tab'=>'banks']) }}" class="{{ $activeTab==='banks'?'active':'' }}">
          Banks <span class="count">{{ $counts['banks'] ?? '' }}</span>
        </a>
        <a href="{{ route('admin.dashboard', ['tab'=>'merchants']) }}" class="{{ $activeTab==='merchants'?'active':'' }}">
          Merchants <span class="count">{{ $counts['merchants'] ?? '' }}</span>
        </a>
        <a href="{{ route('admin.dashboard', ['tab'=>'transactions']) }}" class="{{ $activeTab==='transactions'?'active':'' }}">
          Transactions <span class="count">{{ $counts['transactions'] ?? '' }}</span>
        </a>
      </nav>
    </aside>

    <!-- Page content -->
    <main>
      <div class="container">
        @yield('content')
      </div>
    </main>
  </div>
</body>
</html>

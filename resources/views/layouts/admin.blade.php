<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>@yield('title', config('app.name').' • Admin')</title>
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
  @stack('styles')
</head>
<body>
  @include('admin.partials.header')

  @php $activeTab = request('tab'); @endphp
  <div class="layout">
    @include('admin.partials.sidebar', ['activeTab' => $activeTab, 'counts' => $counts ?? []])

    <main>
      <div class="container">
        @yield('content')
      </div>
    </main>
  </div>

  
  @stack('scripts')
</body>
</html>

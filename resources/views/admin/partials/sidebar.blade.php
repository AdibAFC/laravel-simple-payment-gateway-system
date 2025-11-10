<aside class="sidebar">
  <div class="brand">{{ config('app.name') }}</div>
  <nav class="nav">
    <a href="{{ route('admin.home') }}" class="{{ Route::is('admin.home') ? 'active' : '' }}">
      Home
    </a>
    <a href="{{ route('admin.banks.index') }}" class="{{ Route::is('admin.banks.*') ? 'active' : '' }}">
      Banks <span class="count">{{ $counts['banks'] ?? '' }}</span>
    </a>
    <a href="{{ route('admin.merchants.index') }}" class="{{ Route::is('admin.merchants.*') ? 'active' : '' }}">
      Merchants <span class="count">{{ $counts['merchants'] ?? '' }}</span>
    </a>
    <a href="{{ route('admin.transactions.index') }}" class="{{ Route::is('admin.transactions.*') ? 'active' : '' }}">
      Transactions <span class="count">{{ $counts['transactions'] ?? '' }}</span>
    </a>
  </nav>
</aside>

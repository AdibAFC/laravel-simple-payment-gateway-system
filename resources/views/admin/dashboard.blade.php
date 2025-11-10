@extends('admin.shell')

@section('content')
  <div class="card" style="margin-bottom:18px;">
    <h2 style="margin:0 0 6px 0;">Admin Dashboard</h2>
    <p style="color:#6b7280;margin:0;">Welcome, <strong>{{ auth('admin')->user()->name }}</strong>.</p>
  </div>

  @if (empty($tab))
    <div class="card">
      <h2>Welcome, {{ auth('admin')->user()->name }}</h2>
      <p>Select a tab on the left to view data.</p>
    </div>
  @elseif ($tab==='banks')
    <div class="card">
      <h3 style="margin:0 0 10px 0;">Banks</h3>
      <div class="table-wrap">
        <table class="table">
          <thead>
            <tr><th style="width:70px;">ID</th><th>Name</th><th>URL</th><th>Refund URL</th><th>Created</th></tr>
          </thead>
          <tbody>
            @forelse($banks as $b)
              <tr>
                <td>#{{ $b->id }}</td>
                <td>{{ $b->name }}</td>
                <td><a target="_blank" href="{{ $b->url }}">{{ $b->url }}</a></td>
                <td><a target="_blank" href="{{ $b->refund_url }}">{{ $b->refund_url }}</a></td>
                <td>{{ optional($b->created_at)->format('Y-m-d H:i') }}</td>
              </tr>
            @empty
              <tr><td colspan="5">No banks found.</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
      @if(method_exists($banks,'links')) <div style="margin-top:10px;">{{ $banks->withQueryString()->links() }}</div> @endif
    </div>
  @elseif ($tab==='merchants')
    <div class="card">
      <h3 style="margin:0 0 10px 0;">Merchants</h3>
      <div class="table-wrap">
        <table class="table">
          <thead>
            <tr><th style="width:70px;">ID</th><th>Name</th><th>Email</th><th>Status</th><th>Created</th></tr>
          </thead>
          <tbody>
            @forelse($merchants as $m)
              <tr>
                <td>#{{ $m->id }}</td>
                <td>{{ $m->name }}</td>
                <td>{{ $m->email }}</td>
                <td>{{ ucfirst($m->status) }}</td>
                <td>{{ optional($m->created_at)->format('Y-m-d H:i') }}</td>
              </tr>
            @empty
              <tr><td colspan="5">No merchants found.</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
      @if(method_exists($merchants,'links')) <div style="margin-top:10px;">{{ $merchants->withQueryString()->links() }}</div> @endif
    </div>
  @else
    <div class="card">
      <h3 style="margin:0 0 10px 0;">Transactions</h3>
      <div class="table-wrap">
        <table class="table">
          <thead>
            <tr>
              <th style="width:70px;">ID</th>
              <th>Merchant</th>
              <th>Bank</th>
              <th>POS</th>
              <th>Currency</th>
              <th>Account #</th>
              <th>Amount</th>
              <th>Net Amount</th>
              <th>Created</th>
            </tr>
          </thead>
          <tbody>
            @forelse($transactions as $t)
              <tr>
                <td>#{{ $t->id }}</td>
                <td>{{ optional($t->merchant)->name ?? '—' }}</td>
                <td>{{ optional($t->bank)->name ?? '—' }}</td>
                <td>{{ optional($t->pos)->pos_name ?? '—' }}</td>
                <td>{{ optional($t->currency)->code ?? '—' }}</td>
                <td>{{ $t->account_no }}</td>
                <td>{{ number_format($t->amount, 2) }}</td>
                <td>{{ number_format($t->net_amount, 2) }}</td>
                <td>{{ optional($t->created_at)->format('Y-m-d H:i') }}</td>
              </tr>
            @empty
              <tr><td colspan="9">No transactions found.</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
      @if(method_exists($transactions,'links')) <div style="margin-top:10px;">{{ $transactions->withQueryString()->links() }}</div> @endif
    </div>
  @endif
@endsection

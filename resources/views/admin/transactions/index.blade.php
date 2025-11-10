{{-- resources/views/admin/transactions/index.blade.php --}}
@extends('layouts.admin')
@section('title', config('app.name').' • Transactions')

@section('content')
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
    <div style="margin-top:10px;">{{ $transactions->links() }}</div>
  </div>
@endsection

{{-- resources/views/admin/merchants/index.blade.php --}}
@extends('layouts.admin')
@section('title', config('app.name').' • Merchants')

@section('content')
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
    <div style="margin-top:10px;">{{ $merchants->links() }}</div>
  </div>
@endsection

{{-- resources/views/admin/banks/index.blade.php --}}
@extends('layouts.admin')
@section('title', config('app.name').' • Banks')

@section('content')
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
    <div style="margin-top:10px;">{{ $banks->links() }}</div>
  </div>
@endsection

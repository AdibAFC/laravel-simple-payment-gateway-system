@extends('admin.shell')

@section('content')
  <div class="card">
    <h2 style="margin:0 0 10px 0;">Admin Dashboard</h2>
    <p style="color:#6b7280;margin:0 0 16px 0;">
      Welcome, <strong>{{ auth('admin')->user()->name }}</strong>.
    </p>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ligula a
      lorem sagittis convallis. (Dummy gypsum text)
    </p>
  </div>
@endsection

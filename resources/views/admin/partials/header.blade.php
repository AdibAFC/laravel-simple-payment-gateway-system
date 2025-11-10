<header>
  <div><strong>{{ config('app.name') }} Admin</strong></div>
  <form method="POST" action="{{ route('admin.logout') }}">
    @csrf
    <button class="btn" type="submit">Logout</button>
  </form>
</header>

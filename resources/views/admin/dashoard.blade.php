<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>

<body>
  <a href="{{ route('logout') }}" onclick="event.preventDefault()"; document.getElementById('logout-form').submit();">Logout</a>
  <form id="logout-form"action="{{ route('logout') }}" method="POST">
    @csrf
    </form>
    <h1>Dashboard Admin</h1>
    @if ($message = session::get('success'))
    <p>{{ $message }}</p>
    @else
    <P>you are logged in!</P>
    @endif
</body>

<footer>

</footer>

</html>
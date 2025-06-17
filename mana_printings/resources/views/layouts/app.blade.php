<!DOCTYPE html>
<html>
<head>
    <title>MANA Printings Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <a href="{{ url('https://www.facebook.com/sirtroytuayon') }}" class="navbar-brand">MANA Printing Inventory</a>

            <a href="{{ route('auth.logout') }}" class="bg-red-600 text-white px-3 py-1 rounded" style="float: right;">Logout</a>
            
        </div>
    </nav>
    @yield('content')
</body>
</html>

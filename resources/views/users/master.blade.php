<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('user-template') }}/css/style.css">
</head>

<body>
    <div class="wrapper">

        @include('users.layouts.sidebar')

        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="{{ asset('user-template') }}/image/profil.jpg" alt="Profil"
                                    class="avatar img-fluid rounded">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Main content -->
            @yield('content')
            <!-- Theme toggle -->
            <a href="#" class="theme-toggle">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAABxklEQVRIS9WVzytFQRTH3wtZWEmUUhJZW8sGC9lZKH8ARVKKIr9CfpfYYOHH3kIpKyk/NtbWwkoUIVlYUPh8a+7rmnfvm/tu3sKpTzN35sw5c2bOnJtM5FiSObafyMaBdL/MhiKvi6yI4T91MIHBDXi2jvDbRJFnjZfw3QNz9pEHRTCG0ixcQSPcOe6pgvlTqIERWPTrBzmoROEYqmEQVhwOhphfgmtogluXA82XQRfMG+V22l4TkYZOYA32zfwo7TY82puJcsnLJpKgQKYZnMoUoctBB4t3jYEZWl28pA90V5IWOApz4nJwwcI6GIBVy4iXDDIuJ4Hid6AUlOgxeWn4ST8fiuHVslDO9z28gNJUkmbDc+B/RFL0xj/oF4Q4UCI8wDsUmTXeS0/ZcB3ROZr10A2bVgTKqnU4A72XQHE5aGOVUvEN9Ij2oBA0vmB23kp7GNeB1mVK03Hm08qD31lYBDrfTrNL6euh9UODWXxAuwNqJcqoLYj00FQqVFuqIEqpGEZP9ecGdBfOUuHl9yXKzRCl2Kl21YJKhu4mJWFHNImGMuTJr0w/rFyXMqdMUxX+Ja4ssjfzf/5odqSxv7M5olhOfgA4ZVEZ/9UCGgAAAABJRU5ErkJggg=="
                    class="sun" />
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABMAAAATCAYAAAByUDbMAAABvElEQVQ4T62UTSgEYRiAjfxFaEs52mJTCm2hbI5KOPiJLVlHR397duWGHHaVlJOQXBQH4kS4kMO2pLRXkotQpPG828z2GfOzW7aeZub9eb73m5kdLe8ff5qbS9f1cvIBTdOuslnTVobET/M8DEIxVCN88hL+kSESwTrIVG9QJkJkXznJEHXTsA/P0GVM14qoyksk+cxkiGSClLGtdgQJYttch43JPr2EqixK8QJEES1JI7IZDosQInaei0yKg+Cj8cOQ1XO8hS1iI1nJmEAmlG2c0CT3KvMjJ/ewB3rJHbgJ09ukwcfhBdZoGLfIari+gBIYIn/sJDRlUihb26A4Yi1msQAxmaoO4hCDJLWk0g8uyPmp+gBSBF8JNtqtTFMF8VmYgiKbmk5VtkzBJDQgTDptBWkluT4IQS10QAH4VZls5Q72kPU7ydQ44jauL2GHnvCvvxNJeb+mYQUmKPh2mbCJ3CHIPWum9sEqk3txBi3GimMU3VumyedaXvA5KIRhanalxu6PXkp8FUZBhwTcwCPISy0LyUdAviIRREfmYo7fM7YsTfLkBoytmD3XnGxCDNG7OrXrx1EtzOb8B/9fmmx7y2YiAAAAAElFTkSuQmCC"
                    class="moon" />
            </a>
          
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('user-template') }}/js/script.js"></script>

</html>

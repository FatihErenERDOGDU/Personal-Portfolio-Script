<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dashboard.css') }}">
</head>
<body>
<input type="checkbox" id="menu" name="">
<div class="sidebar">
    <div class="sidebar-brand">
        <h2><span class="fa fa-user-o"></span>ADMIN DASHBOARD</h2>
    </div>

    <div class="sidebar-menu">
        <ul>
            <li>
                <a href="{{ route('admin.home') }}" class="active"><span class="fa fa-home"></span><span>Home</span></a>
            </li>
            <li>
                <a href="{{ route('admin.dashboard') }}"><span class="fa fa-tasks"></span><span>Dashboard</span></a>
            </li>
            <li>
                <a href="{{ route('admin.blog.index') }}"><span class="fa fa-th-large"></span><span>Blog</span></a>
            </li>
            <li>
                <a href="{{ route('admin.about') }}"><span class="fa fa-address-book"></span><span>About</span></a>
            </li>
            <li>
                <a href="{{ route('admin.skills.index') }}"><span class="fa fa-clipboard"></span><span>Skills</span></a>
            </li>
            <li>
                <a href="{{ route('admin.contact') }}"><span class="fa fa-user"></span><span>Contact</span></a>
            </li>
            <li class="dropdown">
                <a href="#settingsMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fa fa-cog"></span><span>Settings</span></a>
                <ul class="collapse list-unstyled" id="settingsMenu">
                    <li>
                        <a href="{{ route('admin.settings.header.edit') }}"><span class="fa fa-caret-right"></span>HEADER EDIT</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.footer.edit') }}"><span class="fa fa-caret-right"></span>FOOTER EDIT</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.pages.index') }}"><span class="fa fa-caret-right"></span>NEW PAGE</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>

<div class="content">
    <header>
        <p><label for="menu"><span class="fa fa-bars"></span></label><span class="home">Home</span></p>

        <div class="search-wrapper">
            <span class="fa fa-search"></span>
            <input type="search" name="" placeholder="search" />
        </div>

        <div class="user-wrapper" id="dropdown">
            <div>
                <small>Admin</small>
            </div>

            <img src="{{ asset('assets/img/admin_img.jpg') }}" width="30" height="30" class="logo-admin">
            <div class="dropdown-content">
                <p>My Profile</p>
                <!-- Log Out Form -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-button">LOG OUT</button>
                </form>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
</body>
</html>

<!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar-header text-center">
        <h3>Dashboard</h3>
        <img src="{{url('/images/dashboard/dashboard.png')}}" class="mt-2" width="100" height="100" alt="welcome" />
    </div>
    <ul class="list-unstyled components">
        <p class="text-white font-weight-bold text-center">welcome {{ Auth::user()->name }}</p>
        <li class="active">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="#">Home 1</a>
                </li>
                <li>
                    <a href="#">Home 2</a>
                </li>
                <li>
                    <a href="#">Home 3</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">About</a>
        </li>
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{route('profile')}}">profile</a>
        </li>
        <li>
            <a href="#">edit profile</a>
        </li>

</nav>

    

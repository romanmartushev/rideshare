<nav class="navbar navbar-expand-sm bg-light navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/">RideShare</a>
        </li>
        @foreach($menu as $key=>$value)
            <li class="nav-item">
                <a class="nav-link" href="{{$value['url']}}">{{$value['title']}}</a>
            </li>
        @endforeach
    </ul>
</nav>

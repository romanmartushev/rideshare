@php
    $menu_items = [];
        $menu = wp_get_nav_menu_items('main-navigation');
        foreach ($menu as $item){
            array_push($menu_items, ['title' => $item->title, 'url' => $item->url]);
        }
@endphp
<nav class="navbar navbar-expand-sm bg-light navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/">RideShare</a>
        </li>
        @foreach($menu_items as $key=>$value)
            <li class="nav-item">
                <a class="nav-link" href="{{$value['url']}}">{{$value['title']}}</a>
            </li>
        @endforeach
    </ul>
</nav>

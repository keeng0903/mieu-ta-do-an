<nav class="cd-stretchy-nav">
    <a class="cd-nav-trigger" href="#0">
        <span aria-hidden="true"></span>
    </a>

    <ul>
        <li><a href="{{route('home')}}"  id="text-color-menu" class="active"><span>Trang Chủ</span></a></li>
        @if(!empty(Session()->get('user')))
        <li><a href="{{route('user.logout')}}" id="text-color-menu"><span></span>Đăng Xuất</a></li>
        @else
        <li><a href="{{route('user.login')}}" id="text-color-menu"><span></span>Đăng Nhập</a></li>
        @endif
        <li><a href="#0" id="text-color-menu" ><span>Lịch Sử</span></a></li>
        <li><a href="{{route('home.camera')}}" id="text-color-menu"><span>Camera</span></a></li>
        <li><a href="{{route('admin.login')}}" id="text-color-menu"><span>Login Admin</span></a></li>
    </ul>

    <span aria-hidden="true" class="stretchy-nav-bg"></span>
</nav>


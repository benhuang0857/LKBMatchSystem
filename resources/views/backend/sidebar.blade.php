<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
      <div class="sidebar-brand-icon">
        <img src="{{ URL::asset('images/lkblogo.png')}}" style="max-width:50px">
      </div>
      <div class="sidebar-brand-text mx-3">後台管理<sup>1.0版</sup></div>
    </a>
  
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="/admin">
        <i class="fa fa-tachometer"></i>
        <span>控制台</span></a>
    </li>

    @if (auth()->user()->role == 'normal')
    <!-- Divider -->
    <hr class="sidebar-divider">
    
    <!-- Heading -->
    <div class="sidebar-heading">
      購買的服務
    </div>
    
    <li class="nav-item">
      <a class="nav-link" href="/admin/ticket/cart">
        <i class="fa fa-shopping-basket"></i>
        <span>您所購買的服務</span></a>
    </li>
    @endif

    @if (auth()->user()->role == 'super')
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      最高權限管理者
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="/admin/list-all">
        <i class="fa fa-users"></i>
        <span>所有名單</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="/admin/user/list-all">
        <i class="fa fa-users"></i>
        <span>所有使用者清單</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="/admin/ticket/list-all">
        <i class="fa fa-users"></i>
        <span>所有訂單</span>
      </a>
    </li>

    @endif
    
    @if (auth()->user()->role == 'normal')
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      名單管理
    </div>
  
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="/admin/list">
        <i class="fa fa-users"></i>
        <span>您的名單</span>
      </a>
    </li>
  
    <!-- Divider -->
    <hr class="sidebar-divider">
  
    <!-- Heading -->
    <div class="sidebar-heading">
      頁面管理
    </div>
  
    <li class="nav-item">
      <a class="nav-link collapsed" href="/admin/storepage">
        <i class="fa fa-file-o"></i>
        <span>管理商家頁面</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="/admin/ads">
        <i class="fa fa-adn"></i>
        <span>刊登消息或廣告</span></a>
    </li>

    @endif

    @if (auth()->user()->role == 'super' || auth()->user()->role == 'manager')
    <!-- Heading -->
    <div class="sidebar-heading">
      用戶管理
    </div>

    <li class="nav-item">
      <a class="nav-link" href="/register">
        <i class="fa fa-user-plus"></i>
        <span>創建新用戶</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="/admin/user/list">
        <i class="fa fa-sitemap"></i>
        <span>您所創建的用戶</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="/admin/ticket/list">
        <i class="fa fa-list-alt"></i>
        <span>目前販售清單</span></a>
    </li>
    @endif
    <!-- Heading -->
    <div class="sidebar-heading">
      前台
    </div>

    <li class="nav-item">
      <a class="nav-link" href="/">
        <i class="fa fa-home"></i>
        <span>回到前台首頁</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fa fa-sign-out"></i>
        <span>Logout</span></a>  
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
      </form>
    </li>
</ul>
<!-- End of Sidebar -->
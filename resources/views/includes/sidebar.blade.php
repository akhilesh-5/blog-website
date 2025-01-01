<div class="left main-sidebar">
      <div class="sidebar-inner">
        <div id="sidebar-menu">
          <div class="headerbar-left">
            <div class="list-inline menu-left mb-0">
              <a class="xbutton  button-menu-mobile open-left">
                <small class="mnln1"></small>
              </a>
            </div>
            <a class="xbutton open-left mbclose">
              <ion-icon name="close-circle-outline"></ion-icon>
            </a>
          </div>
          <ul class="smenu-slct">
            <li>
              <span class="tit"><b>Main Links</b></span>
            </li>
            <li class="submenu {{ request()->is('dashboard') ? 'active' : '' }}">
    <a href="{{ url('dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">
        <span><b>Dashboard</b></span>
    </a>
</li>


<li class="submenu"> <a href="{{ url('blogs') }}"
                        class="{{ (Request::segment(1) == 'blogs') ? 'active' : '' }}"> 
                        <span><b>Blogs</b></span></a> </li>
<li class="submenu {{ request()->is('users') ? 'active' : '' }}">
        <a href="{{ url('users') }}" class="{{ request()->is('users') ? 'active' : '' }}">
            <span><b>Users</b></span>
        </a>
    </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
</div>
</div>
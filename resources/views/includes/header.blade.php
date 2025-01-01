<div class="adminbody">
    <!-- top bar navigation -->
    <div class="headerbar">
      <div class="stky">
        <nav class="navbar-custom">
          <div class="list-inline menu-left mb-0">
            <a class="xbutton  button-menu-mobile open-left">
              <small class="mnln1"></small>
            </a>
            <li>
            </li>
          </div>
        <div class="prf-slct">
            <small class="clndr"><ion-icon name="calendar-outline"></ion-icon></small>
            <ul class="list-inline float-right mb-0">
              <li class="list-inline-item dropdown notif"> <a class="nav-link dropdown-toggle nav-user"
                data-bs-toggle="dropdown"  href="#" role="button" aria-haspopup="false" aria-expanded="false">
                  <div class="use-admt-algn">
                    <span class="tlogdwn">
                      <ion-icon name="person-outline" class="avatar-rounded"></ion-icon>
                    </span>
                    <ul>
                      <li>
                        <b>Admin</b>
                      </li>
                    </ul>
                    <ion-icon class="down-outline" name="chevron-down-outline"></ion-icon>
                  </div>
                </a>
                <form action="{{ route('logout') }}" method="POST" id="logout-form">
                @csrf
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                  <div class="drp-logout"  >
                    <a href="{{ route('logout') }}" class="notify-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <ion-icon name="log-out-outline"></ion-icon>
                      <span>Logout</span>
                    </a>
                  </div>
                    </div>
                  </form>
        </nav>
      </div>
    </div>
</div>

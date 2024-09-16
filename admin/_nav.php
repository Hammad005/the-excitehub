<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="adminpanel.php" class="logo">
              <img
                src="assets/img/kaiadmin/logo_light.png"
                alt="navbar brand"
                class="navbar-brand mt-2"
                height="80%"
              />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item ">
                <a
                  
                  href="adminpanel.php"
                  class="collapsed"
                  aria-expanded="false"
                >
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Components</h4>
              </li>
              <li class="nav-item">
                <a href="users.php">
                  <i class="fas fa-users"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="feedback.php">
                  <i class="fas fa-comments"></i>
                  <p>Feedbacks</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="allpackages.php">
                  <i class="fas fa-gift"></i>
                  <p>Packages</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="subscribers.php">
                  <i class="fas fa-star"></i>
                  <p>Subscribers</p>
                </a>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#theater">
                <i class="fas fa-film"></i>
                  <p>Movie Theaters</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="theater">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="movie_theaters.php">
                        <span class="sub-item">Movie Theaters List</span>
                      </a>
                    </li>
                    <li>
                      <a href="add_theater.php">
                        <span class="sub-item">Add Movie Theaters</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#movie">
                <i class="fas fa-video"></i>
                  <p>Movies</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="movie">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="movies_in_theaters.php">
                        <span class="sub-item">Movies in theaters list</span>
                      </a>
                    </li>
                    <li>
                      <a href="movie_orders.php">
                        <span class="sub-item">Movie Ticket Orders</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#park">
                <i class="fas fa-dice"></i>
                  <p>Amusement Parks</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="park">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="parks.php">
                        <span class="sub-item">Amusement Parks List</span>
                      </a>
                    </li>
                    <li>
                      <a href="add_park.php">
                        <span class="sub-item">Add Amusement Park</span>
                      </a>
                    </li>
                    <li>
                      <a href="park_order.php">
                        <span class="sub-item">Amusement Park Ticket Orders</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#event">
                  <i class="fas fa-calendar-check"></i>
                  <p>Events</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="event">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="events.php">
                        <span class="sub-item">Events List</span>
                      </a>
                    </li>
                    <li>
                      <a href="add_event.php">
                        <span class="sub-item">Add Event</span>
                      </a>
                    </li>
                    <li>
                      <a href="event_order.php">
                        <span class="sub-item">Event Ticket Orders</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#cricket">
                  <i class="fas fa-baseball-ball"></i>
                  <p>Cricket Match</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="cricket">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="cricket.php">
                        <span class="sub-item">Cricket Matches List</span>
                      </a>
                    </li>
                    <li>
                      <a href="add_cricket.php">
                        <span class="sub-item">Add Cricket Match</span>
                      </a>
                    </li>
                    <li>
                      <a href="cricket_order.php">
                        <span class="sub-item">Match Ticket Orders</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a href="adminlogout.php">
                  <i class="fas fa-sign-out-alt"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- End Sidebar -->

      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="index.php" class="logo">
                <img
                  src="assets/img/kaiadmin/logo_light.svg"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
                </button>
              </div>
              <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
              </button>
            </div>
            <!-- End Logo Header -->
          </div>
          <!-- Navbar Header -->
          <nav
            class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
          >
            <div class="container-fluid">
              <nav
                class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex"
              >
              <h3 class="fw-bold mt-3">Admin Panel</h3>
              </nav>

              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                
                
                
                

                <li class="nav-item topbar-user dropdown hidden-caret">
                  
                  <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    id="messageDropdown"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                  
                    <span class="profile-username">
                      <span class="op-7">Hi,</span>
                      <span class="fw-bold"><?php echo $_SESSION['username'];?></span>
                      <span class="caret"></span>
                    </span>
                  </a>
                  <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                      <li>
                        <div class="user-box">
                          <div class="u-text">
                            <h4><?php echo $_SESSION['username'];?></h4>
                            <small
                              >The Admin</small
                            >
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="manage_admin.php">Manage Account</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="adminlogout.php">Logout</a>
                      </li>
                    </div>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
          <!-- End Navbar -->
        </div>
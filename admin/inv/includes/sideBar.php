              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                  <?php
                    if($user_level == "c"){
                        echo '<li><a><i class="fa fa-table"></i> User Management <span class="fa fa-chevron-down"></span></a><ul class="nav child_menu"><li><a href="new_user">New User</a></li><li><a href="view_user">View All Users</a></li></ul></li>';
                    }
                  ?>
                  </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->
          </div>
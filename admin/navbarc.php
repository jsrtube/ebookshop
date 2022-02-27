
          <li class="nav-item">
            <a href="index.php" class="nav-link <?php if($page=='home'){echo 'active';} ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
           
          </li>
         
          
        
       
          <li class="nav-item">
            <a href="quizadd.php" class="nav-link <?php if($page=='add_task'){echo 'active';} ?>">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Add Task
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="track.php" class="nav-link <?php if($page=='track'){echo 'active';} ?>">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Track
              </p>
            </a>
           
          </li>
         
          <li class="nav-item">
            <a href="useradd.php" class="nav-link <?php if($page=='add_user'){echo 'active';} ?>">
              <i class="nav-icon far fa-user"></i>
              <p>
                Add user
              </p>
            </a>
          </li>
		  
           <li class="nav-item">
            <a href="#" class="nav-link <?php if($page=='manage_admin'or'manage_user'){echo '';} ?>">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Operations
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="manage_task.php" class="nav-link <?php if($page=='manage_task'){echo 'active';} ?>">
                  <i class="nav-icon fas fa-tasks"></i>
                  <p>Manage Task</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage_user.php" class="nav-link <?php if($page=='manage_user'){echo 'active';} ?>">
                  <i class="nav-icon fas fa-user-cog"></i>
                  <p>Manage User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage_activity.php" class="nav-link <?php if($page=='manage_activity'){echo 'active';} ?>">
                  <i class="nav-icon fas fa-upload"></i>
                  <p>Manage Activity</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage_admin.php" class="nav-link <?php if($page=='manage_admin'){echo 'active';} ?>">
                 <i class="nav-icon fas fa-user-shield"></i>
                  <p>Manage Admin</p>
                </a>
              </li>
            </ul>
          </li>
             
			 
          <li class="nav-item">
            <a href="qr_create.php" class="nav-link <?php if($page=='qr_create'){echo 'active';} ?>">
              <i class="nav-icon fas fa-qrcode"></i>
              <p>
                Create Qr Code
              </p>
            </a>
            
          </li>
		  <li class="nav-item">
            <a href="manage_result.php" class="nav-link <?php if($page=='manage_result'){echo 'active';} ?>">
              <i class="nav-icon fas fa-cube"></i>
              <p>
                Result
              </p>
            </a>
            
          </li>
		  <li class="nav-item">
            <a href="logout.php" class="nav-link <?php if($page=='logout'){echo 'active';} ?>">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Logout
              </p>
            </a>
            
          </li>

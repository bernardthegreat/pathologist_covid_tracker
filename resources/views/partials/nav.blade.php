

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      
      <span class="brand-text font-weight-light">Covid19 Lab Tracker</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="/analytics/patient_analytics" class="nav-link">
                  <i class="nav-icon fa fa-chart-line"></i>
                  <p>Patient Analytics</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="nav-icon  fa fa-chart-line"></i>
                  <p>Department Analytics</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="nav-icon  fa fa-chart-line"></i>
                  <p>Disposition Analytics</p>
                </a>
              </li>


            </ul>
          </li>

          <li class="nav-item">
            <a href="{{ route('patients.index') }}" class="nav-link">
              <i class="nav-icon fa fa-hospital-user"></i>
              <p>
                Patients
               
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('patient_requests.index') }}" class="nav-link">
              <i class="nav-icon fa fa-file-medical"></i>
              <p>
                Patient Requests
               
              </p>
            </a>
          </li>

        

          

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-user-cog"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                  <i class="nav-icon fa fa-stethoscope"></i>
                  <p>
                    Pathologists
                  
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('departments.index') }}" class="nav-link">
                  <i class="nav-icon fa fa-hospital"></i>
                  <p>
                    Departments
                  
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dispositions.index') }}" class="nav-link">
                  <i class="nav-icon fa fa-hospital-user"></i>
                  <p>
                    Dispositions
                  </p>
                </a>
              </li>
              

            </ul>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

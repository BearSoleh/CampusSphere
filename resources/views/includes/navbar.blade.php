<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ url('/') }}">Campus Guard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="{{ url('/') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('legal') }}">Legal Reminder</a>
          </li>

          


          @if (Auth::User())

          <li class="nav-item">
            <a class="nav-link" href="{{ route('report.form') }}">File Report</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('report') }}">Status</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('incident_type') }}">Incident Type</a>
          </li>


          <li class="nav-item">
            <a class="nav-link" href="{{ route('incident_type') }}">Manage User</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}">Log Out</a>
          </li>    
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li> 
          <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Register</a>
          </li>  
          @endif
        </ul>
      </div>
    </div>
  </nav>
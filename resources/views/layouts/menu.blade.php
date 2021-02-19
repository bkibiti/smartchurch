 <!-- Sidebar Menu -->
 <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
  
      <li class="nav-item">
        <a href="{{route('home')}}" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            {{ __('menu.dashboard')}}
          </p>
        </a>
      </li>
      <li class="nav-item">
      <a href="{{route('calender')}}" class="nav-link">
          <i class="nav-icon far fa-calendar-alt"></i>
          <p>
            {{ __('menu.calender')}}
            {{-- <span class="badge badge-info right">2</span> --}}
          </p>
        </a>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-user-friends"></i>
          <p>
            {{ __('menu.members')}}
            <i class="fas fa-angle-left right"></i>
            
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
          <a href="{{route('people.create')}}" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>{{ __('menu.newmember')}}</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('people.index')}}" class="nav-link">
                <i class="fas fa-angle-double-right"></i>
                <p>{{ __('menu.memberslist')}}</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="{{route('dependants.index')}}" class="nav-link">
                <i class="fas fa-angle-double-right"></i>
                <p>{{ __('menu.dependants')}}</p>
              </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{route('people.pending')}}" class="nav-link">
                <i class="fas fa-angle-double-right"></i>
                <p>{{ __('menu.approve')}}</p>
              </a>
          </li> --}}
       
     
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-users"></i>
          <p>
            {{ __('menu.groups')}}
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('services.create')}}" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p> {{ __('menu.newgroup')}}</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('services.index')}}" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>{{ __('menu.grouplist')}}</p>
            </a>
          </li>
        
        </ul>
      </li>
      {{-- <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-calendar-alt"></i>
          <p>
            {{ __('menu.events')}}
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
          <a href="{{route('event-types.index')}}" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>{{ __('menu.eventtype')}}</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('events.index')}}" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>{{ __('menu.eventlist')}}</p>
            </a>
          </li>
        
      </ul>
      </li> --}}
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-university"></i>
          <p>
            {{ __('menu.pledges')}}
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
          <a href="{{route('fund-activities.index')}}" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>{{ __('menu.pledgetype')}}</p>
            </a>
          </li>
          <li class="nav-item">
          <a href="{{route('pledges.index')}}" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>{{ __('menu.pledgelist')}}</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-credit-card"></i>
          <p>
            {{ __('menu.payment')}}
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('payments.create')}}" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>{{ __('menu.enterpayment')}}</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('payments.index')}}" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>{{ __('menu.paymentlist')}}</p>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-envelope"></i>
          <p>
           SMS
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('sms.create')}}" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>Tuma SMS</p>
            </a>
          </li>
      
          <li class="nav-item">
            <a href="{{route('sms.outbox')}}" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>Outbox</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('template.get')}}" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>Violezo</p>
            </a>
          </li>
        </ul>
      </li>

 
    
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-users-cog"></i>
          <p>
            Users
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('roles.index')}}" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>Roles</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('users.index')}}" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>Users</p>
            </a>
          </li>
     
       
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-cogs"></i>
          <p>
            Settings
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
         
      
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>Hali ya Ndoa</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>Uhusiano</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>Nafasi za Uongozi</p>
            </a>
          </li>
      
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>Namna ya Malipo</p>
            </a>
          </li>
        </ul>
      </li>
     
     
    
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
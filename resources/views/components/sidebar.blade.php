<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        
      @foreach (auth()->user()->User_roles as $roles)
          @if ($roles['role_id'] == 1)
            <li class="nav-item">
              <a class="nav-link " href="{{route('products.index')}}">
                <i class="bi bi-file-earmark"></i>
                <span>Inventory</span>
              </a>
            </li>
          @elseif ($roles['role_id'] == 2)
            <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#logs-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-clock-history"></i><span>Logs</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="logs-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                @foreach (auth()->user()->User_roles as $roles)
                    @if ($roles['role_id'] == 3)
                      <li>
                        <a href="{{route('replenishment.index')}}">
                          <i class="bi bi-circle"></i><span>Replenishment</span>
                        </a>
                      </li>
                    @elseif ($roles['role_id'] == 4 )
                      <li>
                        <a href="{{route('consumption.index')}}">
                          <i class="bi bi-circle"></i><span>Consumption</span>
                        </a>
                      </li>
                    @endif
                @endforeach
              </ul>
            </li>
          @elseif ($roles['role_id'] == 5)
              <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-gear-wide"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  @foreach (auth()->user()->User_roles as $roles)
                      @if ($roles['role_id'] == 6)
                        <li>
                          <a href="{{route('categories.index')}}">
                            <i class="bi bi-circle"></i><span>Categories</span>
                          </a>
                        </li>
                      @elseif ($roles['role_id'] == 7)
                        <li>
                          <a href="{{route('department.index')}}">
                            <i class="bi bi-circle"></i><span>Department</span>
                          </a>
                        </li>
                      @elseif ($roles['role_id'] == 8)
                        <li>
                          <a href="{{route('supplier.index')}}">
                            <i class="bi bi-circle"></i><span>Supplier</span>
                          </a>
                        </li>
                      @elseif ($roles['role_id'] == 9 )
                      @endif
                  @endforeach
                </ul>
              </li>
          @elseif ($roles['role_id'] == 10)
            <li class="nav-item">
              <a class="nav-link " href="{{route('user.index')}}">
                <i class="bi bi-person-fill"></i>
                <span>User Management</span>
              </a>
            </li>
          @endif
      @endforeach

    </ul>

  </aside>
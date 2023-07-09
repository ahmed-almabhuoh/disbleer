<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        @php
            $navItems = config('sidebar');
        @endphp

        @foreach ($navItems as $title => $payload)
            <li class="nav-item">
                @if (!$payload['hasSub'])
                    <a class="nav-link " href="{{ $payload['route'] == '#' ?  $payload['route'] : route($payload['route'])}}">
                        <?php echo $payload['icon']; ?>
                        <span>{{ __(ucfirst($title)) }}</span>
                    </a>
                @else
                    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse"
                        href="{{ $payload['route'] == '#' ? $payload['route'] :  route($payload['route']) }}">
                        <i class="bi bi-journal-text"></i><span>{{ __(ucfirst($title)) }}</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                        @foreach ($payload['subs'] as $sub)
                            <li>
                                <a href="{{ route($sub['route']) }}">
                                    <?php echo $sub['icon']; ?>
                                    <span>{{ __(ucfirst($sub['title'])) }}</span>
                                </a>
                            </li>
                        @endforeach

                    </ul>
                @endif
            </li>
        @endforeach

        <!-- ======================================== -->

        <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="pages-register.html">
      <i class="bi bi-card-list"></i>
      <span>Register</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-login.html">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Login</span>
    </a>
  </li> -->
        <!-- ======================================== -->




    </ul>

</aside>

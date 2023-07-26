<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        @php
            $navItems = config('client-sidebar-v1');
        @endphp

        @foreach ($navItems as $title => $payload)
            <li class="nav-item">
                @if (!$payload['hasSub'])
                    <a class="nav-link"
                        @if ($payload['isSoon']) href="#"
                @else
                    href="{{ $payload['route'] == '#' ? $payload['route'] : route($payload['route']) }}" @endif>
                        <?php echo $payload['icon']; ?>
                        <span>{{ __(ucfirst($title)) }}</span>

                        @if ($payload['isSoon'])
                            <div class="container">
                                <small>{{ ' - ' . __('Coming Soon!') }}</small>
                            </div>
                        @endif
                    </a>
                @else
                    @php
                        $parentId = 'forms-nav-' . $loop->index;
                    @endphp
                    <a class="nav-link collapsed" data-bs-target="#{{ $parentId }}" data-bs-toggle="collapse"
                        href="{{ $payload['route'] == '#' ? $payload['route'] : route($payload['route']) }}">
                        <i class="bi bi-journal-text"></i><span>{{ __(ucfirst($title)) }}</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="{{ $parentId }}" class="nav-content collapse " data-bs-parent="#sidebar-nav">

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

        {{-- <li class="nav-item">
            <a class="nav-link " href="index.html">
                <i class="bi bi-grid"></i>
                <span>@yield('category')</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="courses.html">
                <i class="bi bi-book"></i>
                <span>@yield('index')</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link " href="Coins.html">
                <i class="bi bi-journal-richtext"></i>
                <span>Coins</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>

        <li class="nav-item out">
            <a class="nav-link " href="index.html">
                <i class="bi bi-arrow-bar-left"></i>
                <span>Sign out </span>
            </a>
        </li> --}}

    </ul>

</aside>

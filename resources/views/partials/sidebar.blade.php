<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        @php
            $navItems = config('sidebar');
        @endphp

        @foreach ($navItems as $title => $payload)
            @if (!$payload['hasSub'])
                <li class="nav-item">

                    <a class="nav-link "
                        href="{{ $payload['route'] == '#' ? $payload['route'] : route($payload['route']) }}">
                        <?php echo $payload['icon']; ?>
                        <span>{{ __(ucfirst($title)) }}</span>
                    </a>
                </li>
            @else
                <li class="nav-item">
                    @php
                        $parentId = 'forms-nav-' . $loop->index;
                    @endphp
                    <a class="nav-link collapsed" data-bs-target="#{{ $parentId }}" data-bs-toggle="collapse"
                        href="{{ $payload['route'] == '#' ? $payload['route'] : route($payload['route']) }}">
                        <?php echo $payload['icon']; ?><span>{{ __(ucfirst($title)) }}</span><i
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
                </li>
            @endif
        @endforeach

    </ul>

</aside>

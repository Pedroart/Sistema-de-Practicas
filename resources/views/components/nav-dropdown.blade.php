<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon {{ $icon }}"></i>
        <p>
            {{ $title }}
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        @foreach ($links as $link)
            <li class="nav-item">
                <a href="{{ $link['url'] }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{ $link['text'] }}</p>
                </a>
            </li>
        @endforeach
    </ul>
</li>

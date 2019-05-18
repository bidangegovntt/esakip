<nav>
    <ul id="ownmenu" class="ownmenu">    
        <li class="{{ set_active(['/']) }}"><a href="{{ url('/') }}">HOME</a></li>
        <li class="{{ set_active(['c/sakip']) }}"><a href="{{ url('/c/sakip') }}">SAKIP</a></li>
        <li class="{{ set_active(['c/tentang-sakip*']) }}"><a href="{{ url('/c/tentang-sakip') }}">Tentang SAKIP</a></li>
        <li class="{{ set_active(['c/berita*']) }}"><a href="{{ url('/c/berita') }}">BERITA</a></li>
        <li class="{{ set_active(['c/gallery*']) }}"><a href="{{ url('/c/gallery') }}">GALLERY</a></li>
        <li><a href="{{ url('/login') }}">LOGIN</a></li>
    </ul>
</nav>
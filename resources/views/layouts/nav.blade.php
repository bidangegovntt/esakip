<nav>
    <ul id="ownmenu" class="ownmenu">    
        <li class="{{ set_active(['/']) }}"><a href="{{ url('/') }}">HOME</a></li>
        <li class="{{ set_active(['sakip']) }}"><a href="{{ url('/sakip') }}">SAKIP</a></li>
        <li class="{{ set_active(['tentang-sakip*']) }}"><a href="{{ url('/tentang-sakip') }}">Tentang SAKIP</a></li>
        <li class="{{ set_active(['berita*']) }}"><a href="{{ url('/berita') }}">BERITA</a></li>
        <li class="{{ set_active(['gallery*']) }}"><a href="{{ url('/gallery') }}">GALLERY</a></li>
        <li><a href="{{ url('/login') }}">LOGIN</a></li>
        <!--======= SEARCH ICON =========-->
        <li>
        <div class="wrap">
            <div class="search">
            <input type="text" class="searchTerm" placeholder="Search..?">
            <button type="submit" class="searchButton">
                <i class="fa fa-search"></i>
            </button>
            </div>
        </div>
        </li>
    </ul>
</nav>
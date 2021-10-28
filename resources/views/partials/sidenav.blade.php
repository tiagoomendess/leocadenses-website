<div class="navbar-fixed hide-on-large-only hide-on-extra-large-only">
    <nav>
        <div class="nav-wrapper">
            <a href="javascript:void(0)"
               data-target="slide-out"
               style="background-color: rgba(0,0,0,0.1); width: 56px; margin: 0;"
               class="sidenav-trigger hide-on-large-only hide-on-extra-large-only">
                <i style="margin-left: 15px; text-shadow: #1e1e1e 1px 1px;" class="material-icons">menu</i>
            </a>

            <img class="right" style="margin: 3px 15px; width: 50px" src="{{ Voyager::image(setting('site.logo'))}}" alt="">
            <span style="font-weight:800; color: white; font-size: 30px;" class="right">LEOCADENSES</span>

        </div>
    </nav>
</div>

<ul id="slide-out" class="sidenav">
    <li style="height: 160px">
        <div class="user-view">
            <div class="background" style="height: 160px">
                <img src="/images/sidenav_image.jpg">
            </div>
        </div>
    </li>
    {{ menu('site', 'materialize_menu_sidenav') }}
</ul>


<script>
    $(document).ready(function () {
        $('.sidenav').sidenav();
        $('.collapsible').collapsible();
    });
</script>

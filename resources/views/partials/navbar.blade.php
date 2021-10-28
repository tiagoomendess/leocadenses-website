<nav class="hide-on-med-and-down">
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <div class="container">
                    <a href="javascript:void(0)" class="brand-logo">
                        <img style="margin-top: 1px; width: 60px; height: auto" src="{{ Voyager::image(setting('site.logo')) }}"
                             alt="{{ setting('site.title') }}">
                    </a>
                    {{ menu('site', 'materialize_menu') }}
                </div>
            </div>
        </nav>
    </div>
</nav>

<script>
    $(document).ready(() => {
        $(".nav-wrapper > ul").addClass('right hide-on-med-and-down').attr('id', 'nav-mobile')
        $(".dropdown-trigger").dropdown();
    })
</script>

<footer class="page-footer" style="bottom: 0">
    <div class="container">

        <div class="row">
            <div class="col s4 m4 l2 offset-l3 center">
                <a target="_blank" href="https://www.facebook.com/leocadenses">
                    <img src="/images/face_logo.png" alt="Facebook Page" style="width: 50%">
                </a>
            </div>

            <div class="col s4 m4 l2 center">
                <a target="_blank" href="https://www.instagram.com/leocadenses/">
                    <img src="/images/instagram_logo.png" alt="Facebook Page" style="width: 50%">
                </a>
            </div>

            <div class="col s4 m4 l2 center">
                <a target="_blank" href="https://twitter.com/gdrleocadenses">
                    <img src="/images/twitter_logo.png" alt="Facebook Page" style="width: 50%">
                </a>
            </div>

        </div>

        <div class="row">
            <div class="col s12 m12">
                <p class="center">Parceiros</p>
            </div>

            @foreach(\App\Partner::where('visible', true)->orderBy('position', 'asc')->get() as $partner)
                <div class="col s12 m6 l4 center">
                    <a targer="_blank" href="{{ $partner->url }}">
                        <img
                            src="{{ Voyager::image($partner->picture) }}"
                            alt="{{ $partner->name }}"
                            style="width: 80%">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 1987-{{ \Carbon\Carbon::now()->format('Y') }} Todos os Direitos Reservados
        </div>
    </div>
</footer>

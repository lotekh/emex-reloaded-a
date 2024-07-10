<footer class="w-full">
    <div class="sixth_top"></div>
    <div id="fsr" class="main-container footer-container">
        <div class="logo-section">
            <a href="{{ empty($base_url) ? url('/') : url($base_url) }}" aria-label="Logo Emex by Romtehnochim" title="Marca Emex proprietate a Romtehnochim">
                <img id="logo-footer" width="201" height="72" src="{{ asset('images/new_design/general/logo-footer.png') }}" alt="Emex by Romtehnochim logo" title="Marca Emex proprietate a Romtehnochim">
            </a>
            <ul id="fsrfcfu">
                <li>
                    <p class="mt-16">Productie lacuri, vopsele, tencuieli, pardoseli.</p>
                </li>
                <li>
                    <p>Productie vopsele epoxidice, poliuretanice, poliesterice, clorcauciuc.</p>
                </li>
                <li>
                    <p>Aplicari profesionale de pardoseli epoxidice si poliuretanice.</p>
                </li>
            </ul>
            <div class="col contact-info-container">
                <div class="row align-center cursor-default">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#4A4A4A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    <span>
                        Str. Steaua Sudului Nr. 22, Jilava, Ilfov, Romania
                    </span>
                </div>
                <div class="infos-row">
                    <div class="row align-center my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#4A4A4A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        <a href="tel:+40214571693">+4021-457.1693</a>, <a href="tel:+40785-232.552">+40785-232.552</a>
                    </div>
                    <div class="row align-center my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#4A4A4A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        <a href="mailto:office@emex.ro"><em>office@emex.ro</em></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-3">
            <!-- links -->
            <div class="col">
                <p class="title">Linkuri utile</p>
                <div class="link-section">
                    <div class="section">
                        <ul>
                            <li>
                                <a href="{{ url('/') }}" rel="noopener noreferrer">Acasa</a>
                            </li>
                            <li>
                                <a href="{{ url('/servicii') }}" rel="noopener noreferrer">Servicii</a>
                            </li>
                            <li>
                                <a href="{{ url('/blog') }}" rel="noopener noreferrer">Blog</a>
                            </li>
                            <li>
                                <a href="{{ url('/solicita-cotatie') }}" rel="noopener noreferrer">Solicita Cotatie</a>
                            </li>
                            <li>
                                <a href="{{ url('/angajari') }}" rel="noopener noreferrer"><strong><em>- Angajari -</em></strong></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col">
                <p class="title">Cine suntem</p>
                <div class="link-section">
                    <div class="section">
                        <ul>
                            <li>
                                <a href="{{ url('/despre-noi') }}" rel="noopener noreferrer">Despre noi</a>
                            </li>
                            <li>
                                <a href="{{ url('/politica-de-calitate') }}" rel="noopener noreferrer">Politica de calitate</a>
                            </li>
                            <li>
                                <a href="{{ url('/politica-de-mediu') }}" rel="noopener noreferrer">Politica de mediu</a>
                            </li>
                            <li>
                                <a href="{{ url('/politica-sanatate-securitate') }}" rel="noopener noreferrer">Politica de securitate</a>
                            </li>
                            <li>
                                <a href="{{ url('/certificari-iso') }}" rel="noopener noreferrer">Certificari ISO</a>
                            </li>
                            <li>
                                <a href="{{ asset('catalog-emex.pdf') }}" rel="noopener noreferrer">Catalog "EMEX"</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- stiri -->
            <div class="col">
                <div class="footer_news_area">
                    <h3 class="title">Stiri recente</h3>
                    @php
                    $blogArticles = \App\Models\BlogArticle::latest()->limit(3)->get();
                    @endphp
                    <ul class="col">
                        @foreach ($blogArticles as $blogArticle)
                            <li>
                                <div class="news_row mb-16">
                                    <h4 class="news-title"><a href="{{ url('/blog/article', ['id' => $blogArticle->id]) }}">{{ $blogArticle->title }}</a></h4>
                                    <p>{{ $blogArticle->created_at->format('j.m.Y') }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="newsletter-section">
            <div class="title">Newsletter</div>
            <p>
                Daca doriti sa aflati noutati despre noi sau produsele noastre puteti sa ne lasati adresa de mail. Atunci cand vom lansa un produs nou, sau vom desfasura un eveniment cu adevarat important, veti primi informatia.
            </p>
            <form id="newsletter_form" method="POST" class="w-full mt-16" action="{{ url('/newsletter') }}">
                @csrf
                <input type="hidden" name="current_url" value="{{ request()->url() }}">
                <input type="email" required class="w-full form-control" name="NewsletterEmails[email]" placeholder="Adauga email..." id="nfi">
                <input type="submit" class="btn btn-blue w-full mt-8" id="nfs_btn" value="Aboneaza-te">
                <div id="subscribe-msg"></div>
            </form>
        </div>
    </div>

    <div class="main-container">
        <p id="tags_h4">taguri</p>
        {{-- de adus taguri din backend --}}
    </div>

    <div class="bottom-section main-container" id="ftr">
        <div id="fc" class="row align-center">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_312_8025)">
                    <path d="M10.08 10.86C10.13 10.53 10.24 10.24 10.38 9.99C10.52 9.74 10.72 9.53 10.97 9.37C11.21 9.22 11.51 9.15 11.88 9.14C12.11 9.15 12.32 9.19 12.51 9.27C12.71 9.36 12.89 9.48 13.03 9.63C13.17 9.78 13.28 9.96 13.37 10.16C13.46 10.36 13.5 10.58 13.51 10.8H15.3C15.28 10.33 15.19 9.9 15.02 9.51C14.85 9.12 14.62 8.78 14.32 8.5C14.02 8.22 13.66 8 13.24 7.84C12.82 7.68 12.36 7.61 11.85 7.61C11.2 7.61 10.63 7.72 10.15 7.95C9.67 8.18 9.27 8.48 8.95 8.87C8.63 9.26 8.39 9.71 8.24 10.23C8.09 10.75 8 11.29 8 11.87V12.14C8 12.72 8.08 13.26 8.23 13.78C8.38 14.3 8.62 14.75 8.94 15.13C9.26 15.51 9.66 15.82 10.14 16.04C10.62 16.26 11.19 16.38 11.84 16.38C12.31 16.38 12.75 16.3 13.16 16.15C13.57 16 13.93 15.79 14.24 15.52C14.55 15.25 14.8 14.94 14.98 14.58C15.16 14.22 15.27 13.84 15.28 13.43H13.49C13.48 13.64 13.43 13.83 13.34 14.01C13.25 14.19 13.13 14.34 12.98 14.47C12.83 14.6 12.66 14.7 12.46 14.77C12.27 14.84 12.07 14.86 11.86 14.87C11.5 14.86 11.2 14.79 10.97 14.64C10.72 14.48 10.52 14.27 10.38 14.02C10.24 13.77 10.13 13.47 10.08 13.14C10.03 12.81 10 12.47 10 12.14V11.87C10 11.52 10.03 11.19 10.08 10.86ZM12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20Z" fill="#434447" />
                </g>
                <defs>
                    <clipPath id="clip0_312_8025">
                        <rect width="24" height="24" fill="white" />
                    </clipPath>
                </defs>
            </svg>
            <p>
                {{ date('Y') }}
                Emex By Romtehnochim. Toate drepturile rezervate.
            </p>
        </div>
        <div id="footer_links">
            <ul class="footer-list">
                <li>
                    <a href="{{ url('/sitemap.htm') }}">Sitemap</a>
                </li>
                <li>
                    <a class="desktop-terms" href="{{ url('/termeni-si-conditii') }}">Termeni si conditii</a>
                </li>
                <li><a href="{{ url('/confidentialitate-gdpr') }}">Protectie date</a></li>
                <li><a href="{{ url('/politica-de-retur') }}">Retur</a></li>
                <li><a href="{{ url('/faq') }}">Faq</a></li>
                <li><a href="{{ url('/contact') }}" class="b-0">Contact</a></li>
            </ul>
        </div>

        <div id="fsm" class="sprites">
            <span>
                <a href="{{ url('/blog') }}" title="Blog Emex by Romtehnochim">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 179.51975 179.20429">
                        <path fill="#f06a35" d="M20.512413 178.49886c-3.359449-.8837-6.258272-2.1837-8.931866-4.0056-2.256922-1.5379-5.555601-4.7174-6.810077-6.5637-1.532132-2.255-3.293254-6.1168-4.010994-8.795-.732062-2.7319-.743927-3.8198-.757063-69.39501-.01306-65.24411.0018-66.67877.719335-69.48264C3.259268 10.34132 11.117019 2.7971 21.251347.54646 24.165189-.10065 154.331139-.21383 157.47424.42803c8.508999 1.73759 15.197718 6.84619 19.06824 14.56362 3.07712 6.13545 2.80203-.61622 2.94296 72.23085.0897 46.34991.007 65.80856-.28883 68.23286-1.38576 11.3442-9.210679 20.1431-20.470153 23.0183-2.880202.7354-3.882129.7459-69.275121.7259-63.227195-.019-66.474476-.052-68.938923-.7007z" />
                        <path fill="none" d="M-82.99522 87.83767V-84.06232h1020v343.79998h-1020V87.83767z" />
                        <path fill="#fff" d="M115.16168 144.83466c8.064748-1.1001 14.384531-4.3325 20.313328-10.3896 4.288999-4.38181 6.973811-9.12472 8.728379-15.41921.728903-2.6149.790018-3.88807.923587-19.24149.100809-11.58796.01669-17.01514-.285075-18.38528-.437344-1.98593-1.67711-3.83016-3.091687-4.59911-.435299-.23661-3.224334-.53819-6.197859-.67015-4.982681-.22115-5.540155-.31832-7.11287-1.24-2.494681-1.46198-3.181724-3.04069-3.188544-7.32677-.01304-8.1894-3.421087-15.79237-10.154891-22.65435-4.797263-4.8886-10.14889-8.19759-16.256563-10.05172-1.462167-.44388-4.736105-.59493-15.7023605-.72452-17.2069763-.20332-21.0264035.14939-26.8842785 2.48265-10.799733 4.30168-18.559563 13.36742-21.390152 24.98992-.531646 2.18295-.634845 5.6815-.760427 25.77865-.157327 25.17748.01622 28.87467 1.589422 33.86414 1.299798 4.12233 2.611223 6.64844 5.312916 10.23388 5.146805 6.83036 12.860236 11.76336 20.572006 13.15646 3.669923.6631 48.94793.829 53.585069.1965z" />
                        <path fill="#f06a35" d="M67.5750093 75.71747c-4.1229413-1.13646-5.6634683-7.05179-2.6332273-10.11109 1.9367555-1.95536 2.4721802-2.02981 14.5952492-2.02981 10.8833578 0 11.2491898.0238 12.8478758.83129 2.310253 1.16711 3.314106 2.81263 3.314106 5.43252 0 2.36619-.942769 4.0244-3.045645 5.35691-1.129143.71549-1.803912.76002-12.4672419.82265-6.5844803.0387-11.829856-.0872-12.6111168-.30247zm-.5165819 39.80858c-1.7697484-.77113-3.4178244-2.91327-3.7026534-4.81263-.271319-1.80929.637963-4.29669 2.031786-5.55809 1.7569755-1.59003 2.5280723-1.64307 24.134743-1.66008 22.226353-.0174 22.11068-.0268 24.218307 1.94113 2.976827 2.77944 2.348939 7.7279-1.238363 9.75964l-3.686323.59948-19.213121.22489c-16.8830622.19762-21.6656419-.1114-22.5443756-.49433z" />
                    </svg>
                </a>
            </span>
            <span>
                <a href="https://www.linkedin.com/company/romtehnochim" title="linkedin">
                    <em class="sprite-linkedin"></em>
                </a>
            </span>
            <span>
                <a href="https://www.youtube.com/c/EmexRomtehnochim" title="youtube">
                    <em class="sprite-youtube"></em>
                </a>
            </span>
            <span>
                <a href="https://ro.pinterest.com/romtehnochim/" title="pinterest">
                    <em class="sprite-pinterest"></em>
                </a>
            </span>
            <span>
                <a href="https://www.instagram.com/emexbyromtehnochim/" title="instagram">
                    <em class="sprite-instagram"></em>
                </a>
            </span>
            <span>
                <a href="https://twitter.com/Romtehnochim" title="twitter">
                    <em class="sprite-twitter"></em>
                </a>
            </span>
            <span>
                <a href="https://www.facebook.com/EmexByRomtehnochim/" title="facebook">
                    <em class="sprite-facebook"></em>
                </a>
            </span>
        </div>
    </div>
</footer>

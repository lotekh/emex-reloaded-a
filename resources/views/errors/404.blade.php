@extends('layout.layout')

@section('breadcrumbs')
<ul class="flex gap-xs"><li><a href="/">Acasa</a></li><li class="separator">/</li><li class="-ml-4 ellipsis"><a href="/">404</a></li></ul>
@endsection

@section('content')

<style>
    .outer {
        display: table;
        height: 100%;
        width: 100%;
        margin: 50px auto;
    }

    .middle {
        display: table-cell;
    }

    .inner {
        margin-left: auto;
        margin-right: auto;
        width: 600px;
        background-color: #ffff;
        padding: 15px;
        border: 1px solid #d3eaea;
        border-radius: 15px;
        box-shadow: 0px 0px 6px 0px #9ae6e6;
    }

    #header404 {
        border-bottom: 1px solid #ddd;
        color: #009;
        font-size: 45px;
        font-weight: bold;
        margin-top: 10px;
        display: flex;
        align-items: center;
    }

    #header404 img {
        width: 100%;
        max-width: 222px;
        /* margin-top: 14px; */
        /* margin-left: 10px; */
    }

    #header404 p {
        color: #009;
        font-size: 45px;
        font-weight: bold;
        margin: 0 0 10px;
    }

    .h-404-txt {
        color: #009;
        text-decoration: none;
    }

    #content_title404_1 {
        height: 85px;
        margin-top: 20px;
    }

    #content_title404_1,
    #content_title404_2,
    #content_title404_3,
    #content_title404_4 {
        text-align: center;
    }

    #content_title404_3 {
        display: flex;
        justify-content: center;
        align-items: center;
        color: #009;
    }

    #content_title404_1 h1 {
        display: inline;
        font-size: 3.4em;
        color: #009;
        font-weight: bold;
        position: relative;
        top: -16px;
        margin-left: 10px;
    }

    /* #content_title404_1 img {
    position: relative;
    left: 5px;
    top: -27px;
} */
    #content_title404_1 h1:last-of-type {
        font-size: 5.7em;
        top: 0px;
    }

    #content_title404_2 p {
        font-size: 1.8em;
        color: #009;
        margin: 0px;
        margin-top: 15px;
        margin-bottom: 15px;
    }

    .content-404-small {
        font-size: 0.64em;
        color: #009;
        margin: 0px;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    #content_title404_4>p {
        color: #009;
        font-size: 1em;
        text-align: left;
        padding-left: 48px;
    }

    .social_icon {
        width: 42px;
        height: 42px;
        margin-top: 5px;
        margin-right: 8px;
    }

    .social_icon:hover {
        zoom: 1.1;
        margin-top: 1px;
    }

    .social-links a {
        margin: 10px;
    }

    #desktop_search_form {
        position: inherit;
        margin-right: 10px;
    }

    .navbar-form .input-group {
        display: inline-flex;
    }

    #btn_404_1 {
        padding: 6px 6px 1px;
    }

    #btn_404_2 {
        padding: 6px;
        position: relative;
        width: 110px;
    }

    #btn_404_3 {
        padding: 6px;
        position: relative;
        width: 110px;
        margin-left: 20px;
    }

    .btn-default {
        color: #333;
        background-color: #fff;
        border-color: #ccc;
    }

    a {
        cursor: pointer;
        text-decoration: none;
    }

    .form-control {
        margin-top: 0px;
        display: block;
        width: 100%;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    }

    @media (max-width: 620px) {
        .inner {
            width: auto;
        }

        #content_title404_1 h1:last-of-type {
            display: block;
            margin: 10px auto;
        }

        #content_title404_1 {
            height: unset;
            margin-top: 30px;
        }

        #content_title404_4>p {
            padding-left: 10px;
        }

        #header404 p span {
            display: none;
        }

        #header404 p {
            text-align: center;
        }

        #header404 img {
            margin-top: 0px;
            margin-left: 0px;
        }

        #header404 p a {
            display: block;
        }

        #content_title404_1 h1:last-of-type {
            margin-top: 0px;
            font-size: 4.7em;
        }

        #content_title404_2 p {
            font-size: 1.2em;
            margin: 10px 0 10px;
        }

        #content_title404_3 {
            flex-wrap: wrap;
        }

        .content-404-small {
            font-size: 0.8em;
        }

        #desktop_search_form {
            width: 100%;
            margin: 0px 0px 20px;
        }

        #desktop_search_form .input-group {
            flex: 1 0 100%;
            width: 100%;
        }

        .input-group {
            position: relative;
            display: table;
            border-collapse: separate;
        }

        #header404 {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        }

        #header404 p {
            margin: 5px 0;
        }

        #header404 p a {
            display: inline-block;
        }
    }

    #err_minus,
    #err_link {
        font-size: 36px;
    }


</style>

<div class="outer">
    <div class="middle">
        <div class="inner">
            <div id="header404">
                <p>
                    <a href="{{ route('home') }}" title="Home">
                        <img src="{{ asset('resources/new_design/general/Logo-factura-prof.png') }}" class="mt-16" alt="Logo Emex" width="222" height="81">
                    </a>
                </p>
                <p style="margin-top: 10px">
                    <span style="margin: 0 10px">-</span>
                    <a href="{{ route('home') }}" title="Site index" class="h-404-txt">www.emex.ro</a>
                </p>
            </div>
            <div id="content_title404_1">
                <h1>Oops...</h1>
                <span>
                    <img width="85" height="73" class="atentie-consum" src="{{ asset('resources/images/emex_warning.png') }}" alt="Atentie">
                </span>
                <h1>404</h1>
            </div>
            <div id="content_title404_2">
                <p><em>Pagina nu poate fi accesată... !</em></p>
                <p><span class="content-404-small"><em>Te rugăm să folosești meniul pentru a găsi pagina dorită.</em></span></p>
            </div>
            <div id="content_title404_3">
                <form id="desktop_search_form" target="_top" class="navbar-form navbar-left navbar-search" method="GET" action="{{ url('/search') }}" title="Căutare Vopsea">
                    <div class="input-group">
                        <input type="text" name="zoom_query" id="zoom_searchbox" class="form-control" placeholder="Căutare rapidă">
                        <div class="input-group-btn">
                            <button class="btn btn-default" id="btn_404_1" type="submit" aria-label="Căutare"> 
                                <em class="sprite-search"></em> 
                            </button>
                        </div>
                    </div>
                </form>
                <div class="pull-left" id="404_acasa">
                    <a class="btn btn-default" id="btn_404_2" href="{{ route('home') }}">Acasă</a>
                </div>
                <div class="pull-left" id="404_sitemap">
                    <a href="{{ route('sitemap') }}" title="Lista linkuri" class="btn btn-default" id="btn_404_3">Sitemap</a>
                </div>
            </div>
            <div class="clearfix"></div>
            <div id="content_title404_4">
                <p>Suntem și pe:</p>
                <div class="social-links text-center"> 
                    <a href="https://www.facebook.com/EmexByRomtehnochim/" class="sprite-facebook" title="Facebook"></a> 
                    <a href="https://twitter.com/Romtehnochim" class="sprite-twitter" title="Twitter"></a> 
                    <a href="https://www.instagram.com/emexbyromtehnochim/" class="sprite-instagram" title="Instagram"></a> 
                    <a href="https://ro.pinterest.com/romtehnochim/" class="sprite-pinterest" title="Pinterest"></a> 
                    <a href="https://www.youtube.com/c/EmexRomtehnochim" class="sprite-youtube" title="Youtube"></a> 
                    <a href="https://www.linkedin.com/company/romtehnochim" class="sprite-linkedin" title="LinkedIn"></a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

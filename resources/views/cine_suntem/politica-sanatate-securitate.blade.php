@extends('layout.layout')

@section('seo')
<title>Politica de sanatate si securitate a Romtehnochim</title>
<meta name="keywords" content="sanatate si securitate, securitatea muncii, ISO 18001, politica de sanatate">
<meta name="description" content="Politica de sanatate si securitate a muncii Emex by Romtehnochim producator de pardoseli vopsele lavabile si tencuieli - certificat OHSAS 18001:2007">
<meta property="fb:app_id" content="966242223397117">
<meta property="og:locale" content="ro_RO">
<meta property="og:title" content="Politica de securitate in munca">
<meta property="og:image" content="https://emex.ro/images/social/Sanatate-securitate-munca-sm.jpg">
<meta property="og:image:secure_url" content="https://emex.ro/images/social/Sanatate-securitate-munca-sm.jpg" />
<meta property="og:image:width" content="1200"/>
<meta property="og:image:height" content="628"/>
<meta property="og:image:alt" content="Politica Romtehnochim de sanatate in munca"/>
<meta property="og:description" content="Politica de implementare a sistemului de management al sanatatii si securitatii in munca conform standard BS OHSAS 18001:2007">
<meta property="og:url" content="https://emex.ro/politica-sanatate-securitate">
<meta property="og:site_name" content="Emex by Romtehnochim: vopsele | tencuieli | pardoseli">
<meta property="og:type" content="website"/>
@endsection

@section('css')
    <link rel="stylesheet" href="/{{ minify('css/politica-de-securitate.css') }}">
    <link rel="stylesheet" href="/{{ minify('css/tabs.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li class="font-xs"><a href="/">Acasa</a></li><li class="separator">/</li><li class="font-xs -ml-4"><a href="/despre-noi">Despre noi</a></li><li class="separator">/</li><li class="font-xs -ml-4 ellipsis">Politica de Securitate</li></ul>
@endsection


@section('content')

<div class="politica relative w-full">
    <div class="header_img_bg col justify-center align-center" id="header_img_bg" style="background-image: url('{{ asset('resources/images/securitate-in-munca.jpg') }}'); height: 500px;">
        <h1 class="text-center" id="politica_de_securitate_header">
            POLITICA DE SANATATE SI SECURITATE IN MUNCA A<br>ROMTEHNOCHIM
        </h1>
    </div>
</div>

<div class="main-container product-page mt-32" id="product_container">
    <div class="mt-16 mt-custom">
        <div class="tabs-selector-row">
            <button type="button" name="current_tab" value="0" role="tab" class="btn user-valid valid selected"  aria-selected="true" tabindex="0" onclick="openTab(event, 'Pagina1')"><span>Pagina 1</span></button>
            <button type="button" name="current_tab" value="1" role="tab" class="btn user-valid valid"  aria-selected="false" tabindex="0" onclick="openTab(event, 'Pagina2')"><span>Pagina 2</span></button>
            <button type="button" name="current_tab" value="2" role="tab" class="btn user-valid valid"  aria-selected="false" tabindex="0" onclick="openTab(event, 'Pagina3')"><span>Pagina 3</span></button>
            <button type="button" name="current_tab" value="3" role="tab" class="btn user-valid valid"  aria-selected="false" tabindex="0" onclick="openTab(event, 'Pagina4')"><span>Pagina 4</span></button>
        </div>

        <div class="tab-content-container">
            <div id="Pagina1" class="tab-content active">
                <h2 class="text-blue">1. POLITICA</h2>
                    <p>
                        <span class="alineat_span"></span>“ROMTEHNOCHIM” S.R.L. este hotarata sa
                        asigure un mediu de lucru sigur tuturor angajatilor sai. Implementarea
                        politicilor noastre ne permite sa oferim servicii sigure clientilor nostri.
                        Cautam, de asemenea, sa garantam securitatea vizitatorilor, furnizorilor si
                        publicului ce pot fi afectati de activitatea noastra. Politica noastra este
                        de a aloca resurse adecvate pentru a promova si mentine bunele practici in
                        toate aspectele referitoare la securitatea muncii.
                    </p>
                    <p>
                        <span class="alineat_span"></span>“ROMTEHNOCHIM” S.R.L. ia in considerare
                        toate reglementarile relevante in domeniu sanatatii si securitatii in munca
                        si actioneaza in directia respectarii acestora. Managementul companiei este
                        responsabil pentru a lua masuri in ceea ce priveste:
                    </p>
                    <ul>
                        <li>Asigurarea si intretinerea echipamentelor de lucru astfel incat
                            folosirea lor sa fie sigura si lipsita de riscuri;
                        </li>
                        <li>Asigurarea sigurantei si minimizarea riscurilor in folosirea,
                            manipularea, depozitarea substantelor chimice intrebuintate pentru
                            realizarea produselor organizatiei;
                        </li>
                        <li>Furnizarea de suficiente informatii, instructiuni, instruire si
                            supervizare, astfel incat sa se asigure securitatea muncii pentru toti
                            angajatii;
                        </li>
                        <li>Asigurarea si mentinerea de locuri de munca lipsite de pericol;</li>
                        <li>Asigurarea si mentinerea de cai de evacuare sigure;</li>
                        <li>Asigurarea si mentinerea de facilitati corespunzatoare;</li>
                    </ul>
                    <p>
                        <span class="alineat_span"></span>“ROMTEHNOCHIM” S.R.L. va face toate
                        demersurile necesare pentru a preveni orice incident care s-ar putea solda
                        cu raniri, imbolnaviri si pentru imbunatatirea continua a managementului si
                        performantei Sistemului de Management Integrat (SMI)
                    </p>    
                    <h2 class="text-blue"> 2. DOMENIUL DE APLICARE</h2>
                    <p>
                        <span class="alineat_span"></span>In sensul celor declarate mai sus, “ROMTEHNOCHIM” S.R.L. a implementat sistemul de management al sanatatii si
                        securitatii in munca conform standardului actualizat ISO 45001:2018, aplicabil pentru toate activitatile si in toate compartimentele firmei.
                    </p>
            </div>
            
            <div id="Pagina2" class="tab-content">
                <h2 class="text-orange">3. RESPONSABILITATILE MANAGEMENTULUI</h2>
                    <p>
                        <span class="alineat_span"></span>Actionariatul firmei “ROMTEHNOCHIM” S.R.L. este responsabil pentru sanatatea si securitatea in munca (SSM) a
                        angajatilor si isi exercita aceste responsabilitati prin intermediul Directorului General. Acesta are in ultima instanta 
                        responsabilitatea performantei companiei in domeniul sanatatii si securitatii in munca.
                        “ROMTEHNOCHIM” S.R.L. este convinsa ca SSM este un aspect vital al managementului organizatiei, cu o importanta cel putin egala cu 
                        a altor atributii manageriale.
                    </p>
                    <p>
                        <span class="alineat_span"></span>Organizatia se asteapta ca toti managerii si persoanele de conducere sa isi asume sarcinile legate de securitatea
                        muncii ca parte integranta a responsabilitatilor lor, in asa fel incat sa previna accidentele si imbolnavirile. Fiecare persoana de conducere va fi
                        responsabila in fata functiei superioare directe si in final in fata Directorului General pentru indeplinirea cerintelor SSM.
                    </p>
                    <p>
                        <span class="alineat_span"></span>Performanta privind SSM a tuturor celor cu responsabilitati in domeniu va fi atent si constant monitorizata si evaluata
                        in cadrul sesiunilor de evaluare a performantei. Detalii privind sarcinile si responsabilitatile fiecarui manager/personal cu functie de raspundere in
                        domeniul SSM sunt cuprinse in Sistemul de Management Integrat.
                    </p>

                    <h2 class="text-orange">4. RESPONSABILITATILE ANGAJATILOR</h2>    
                    <p>
                        <span class="alineat_span"></span>“ROMTEHNOCHIM” S.R.L. asteapta de la toti angajatii sai sa coopereze cu managementul in vederea respectarii cerintelor
                        legale si a celor referitoare la SSM specificate in cadrul Sistemului de Management Integrat.
                    </p>
                    <p>
                        <span class="alineat_span"></span>Angajatilor le este reamintit faptul ca trebuie sa anunte imediat conditiile nesigure conducatorilor locurilor de munca, si nu trebuie sa intreprinda actiuni riscante, care ar putea pune in pericol sanatatea si siguranta lor sau a altor persoane. Orice incalcare deliberata a Politicii de Sanatate si Securitate a Muncii sau a regulilor aferente va conduce la actiuni disciplinare. Fiecare angajat trebuie sa primeasca o copie a fisei postului pentru care este angajat, in care sunt precizate responsabilitatile sale pe linie de SSM.
                    </p>
                    <p><span class="alineat_span"></span>Angajatii au obligatia de a-si indeplini obiectivele SSM corespunzatoare postului/functiei indeplinite.</p>    
                    <h2 class="text-orange">5. INSTRUIRE</h2>
                    <p>
                        <span class="alineat_span"></span>“ROMTEHNOCHIM” S.R.L. ofera instruire in domeniul SSM pentru a se asigura ca toti angajatii au competenta necesara
                        pentru a-si asigura activitatea fara riscuri pentru propria persoana sau terti. Aceasta instruire este oferita la angajare si pe toata perioada
                        angajarii.
                    </p>
            </div>
        
            <div id="Pagina3" class="tab-content">
                <h2 class="text-green">6. RESURSE PRIVIND SANATATEA SI SECURITATEA</h2>  
                    <p>
                        <span class="alineat_span"></span>Indatorirea de baza a Reprezentantului Managementului pentru SSM consta in sprijinul acordat companiei pentru indeplinirea obiectivelor SMI. Reprezentantul Managementului pentru SSM are un rol definit si deplina autoritate de a se asigura ca SMI 
                        este stabilit, implementat si mentinut corespunzator cu standardul ISO 45001:2018, si de a asigura raportarea performantei sistemului catre managementul de varf.
                    </p>
                    <p><span class="alineat_span"></span>Rapoartele asupra functionarii SSM sunt utilizate ca baza pentru imbunatatirea SMI.</p>
                    <h2 class="text-green">7. CONSULTAREA</h2>
                    <p>
                        <span class="alineat_span"></span>Politica noastra de SSM cere implicarea activa a tuturor angajatilor. Asiguram consultarea eficienta, comunicare si cooperare in 
                        interiorul organizatiei privind problemele de SSM. In acest mod dorim sa cream o cultura pozitiva care asigura implicarea tuturor 
                        angajatilor la cele mai bune practici in domeniu.
                    </p>
                    <h2 class="text-green">8. CONTROLUL RISCURILOR</h2>
                    <p>
                        <span class="alineat_span"></span>Un program permanent de identificare si evaluare a riscurilor genereaza masuri care asigura sanatatea si siguranta angajatilor 
                        si a tuturor persoanelor afectate de activitatea organizatiei noastre. Masurile includ actiuni de natura tehnica, procedurala, 
                        comportamentala, si sunt reflectate in SMI si in procesele suport. Efectuam inspectii periodice si audituri in scopul evaluarii 
                        eficacitatii masurilor de control asupra riscurilor.
                    </p>
                    <h2 class="text-green">9. MANAGEMENTUL ACCIDENTELOR</h2>
                    <p>
                        <span class="alineat_span"></span>Directorul General sau persoanele delegate de Directorul General sunt responsabili de investigarea si raportarea evenimentelor si 
                        cauzelor tuturor accidentelor care se soldeaza cu raniri, daune materiale sau alte prejudicii, fiind asistati de Reprezentantul
                        Managementului pentru SSM.
                    </p>
                    <p>
                        <span class="alineat_span"></span>In eventualitatea unui accident de munca, procedurile de raportare ale “ROMTEHNOCHIM” S.R.L. trebuie urmate intocmai, inclusiv 
                        anuntarea conducerii companiei. Raportul organizatiei trebuie sa fie completat pentru orice incident referitor la SSM.
                    </p>
                    <p><span class="alineat_span"></span>In eventualitatea unui accident rutier, trebuie indeplinite toate cerintele procedurii de raportare a accidentului. </p>
                    <p>
                        <span class="alineat_span"></span>In anumite situatii, autoritatile legale locale trebuie anuntate, Directorul General fiind responsabil cu conformarea fata de cerintele legale.
                    </p>
            </div>
        
            <div id="Pagina4" class="tab-content">
                <h2 class="text-blue">10. CONTROLUL SI REVIZUIREA POLITICII</h2>     
                    <p>
                        <span class="alineat_span"></span>Copii ale prezentului document vor fi puse
                        la dispozitia tuturor angajatilor si afisate in toate locatiile companiei.
                        In plus, continutul acestui document va fi adus la cunostinta tuturor
                        contractorilor, clientilor si vizitatorilor, precum si oricarei alte parti
                        interesate.
                    </p>
                    <p>
                        <span class="alineat_span"></span>SMI va fi analizat si revizuit periodic in
                        functie de orice modificari legislative in domeniu si/necesitatile
                        organizatiei.
                    </p>
                    <p>
                        <span class="alineat_span"></span>Orice schimbare intervenita va fi aprobata
                        de Directorul General si va fi adusa la cunostinta tuturor persoanelor
                        interesate.
                    </p>
            </div>
        </div>

    </div>
</div>

@endsection


<script>
    document.addEventListener('DOMContentLoaded', function () {
        window.openTab = function(evt, tabName) {
            var i, tabcontent, tablinks;

            tabcontent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].classList.remove("active");
            }

            tablinks = document.getElementsByClassName("btn");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].classList.remove("selected");
                tablinks[i].setAttribute("aria-selected", "false");
            }

            document.getElementById(tabName).classList.add("active");
            evt.currentTarget.classList.add("selected");
            evt.currentTarget.setAttribute("aria-selected", "true");
        };
    });
    </script>
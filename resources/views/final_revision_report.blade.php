<!DOCTYPE html>
<html>

<head>
    <title>Nacrt revizijskog izvješća ili Konačno revizijsko izvješće
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        @page {
            size: A4 portrait;
            margin: 10mm;
        }

        * {
            font-family: DejaVu Sans;
        }

        body {

            margin: 0;
        }

        h1 {
            font-size: 18px;
            padding-top: 6px;
            padding-bottom: 6px;
        }

        .data table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .data th,
        .data td {
            border: 1px solid black;
            padding: 2px;
            text-align: left;
            overflow: hidden;

        }

        .data th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .tg {
            border-collapse: collapse;
            border-spacing: 0;
        }

        .tg td {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-size: 14px;
            overflow: hidden;
            padding: 3px 10px;
        }

        .tg th {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-size: 14px;
            font-weight: normal;
            overflow: hidden;
            padding: 3px 10px;
        }

        .tg .tg-cly1 {
            text-align: left;
            vertical-align: middle;
            width: 150px;
        }

        .tg .tg-cly2 {
            text-align: left;
            vertical-align: middle;
            width: 240px;
        }

        .tg .tg-0lax {
            text-align: left;
            vertical-align: top;
            width: 120px;
        }

        .strikethrough {
            text-decoration: line-through;
        }


        .report .tg {
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 30px;
        }

        .report .tg td {
            border-color: #d3d3d3;
            border-style: solid;
            border-width: 1px;

            font-size: 14px;
            padding: 5px 5px;
        }

        .report .tg th {
            border-color: #d3d3d3;
            border-style: solid;
            border-width: 1px;

            font-size: 14px;
            font-weight: normal;
            padding: 5px 5px;
        }

        .report .tg .upper-header {
            background-color: #ffce93;
            border-color: #d3d3d3;
            font-weight: bold;
            text-align: center;
            vertical-align: top
        }

        table {
            page-break-after: auto;
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }

        td {
            page-break-inside: avoid;
            page-break-after: auto;
            word-wrap: break-word;
            vertical-align: top;
        }

        thead {
            display: table-header-group;
        }

        tfoot {
            display: table-footer-group;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="tg-wrap">
            <table class="tg" style="width: 100%;">
                <colgroup>
                    <col style="width: 50px">
                    <col style="width: 800px">
                    <col style="width: 40px">
                    <col style="width: 40px">
                </colgroup>
                <tbody>
                    <tr>
                        <td class="tg-cly1" rowspan="4"><img style="width: 100px; height: auto;" src="{{ public_path('hl-logo.png') }}" alt=""></td>
                        <td class="tg-cly2" rowspan="4"><strong>OBRAZAC<br>Konačno revizijsko izvješće</strong></td>
                        <td class="tg-0lax">Klasifikacija</td>
                        <td class="tg-0lax"><span style="font-weight:bold">INTERNO</span></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax" style="max-width: 20px;">Oznaka</td>
                        <td class="tg-0lax"><span style="font-weight:bold">OBR-UNR-10</span></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax">Revizija</td>
                        <td class="tg-0lax"><span style="font-weight:bold">1-05/2022</span></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax">Stranica</td>
                        <td class="tg-0lax"><span style="font-weight:bold">1/11</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="front">
        <div>
            <h1>Izvješće unutarnje revizije</h1>
            <h1>{{$revision->name}}</h1>
        </div>
        <div>
            Urbroj: HLIZ…
            Zagreb
        </div>
    </div>
    <div class="sadrzaj">

    </div>
    <div class="upr-sazetak">
        <h2>UPRAVLJAČKI SAŽETAK</h2>
    </div>
    <div>
        1. UVOD
        U sklopu ovog poglavlja izlaže se sljedeće:
        informacije o poslovnom procesu koji je bio predmetom revizije te
        informacije o provedenoj reviziji.

        1.1 INFORMACIJE O POSLOVNOM PROCESU KOJI JE BIO PREDMETOM REVIZIJE
        U sklopu ovog poglavlja izlaže se sljedeće:
        poslovni cilj procesa,
        opis procesa,
        glavni rizici.
        1.1.1 Poslovni cilj procesa
        (Navesti poslovni cilj procesa)
        1.1.2 Opis procesa
        (Na sažet način iznijeti najznačajnije informacije o procesu koji je predmet revizije)
        1.1.3 Glavni rizici
        (Navesti glavne rizike)
        1.2 INFORMACIJE O PROVEDENOJ REVIZIJI
        U sklopu ovog poglavlja izlaže se sljedeće:
        temelj za provedbu i razdoblje provedbe revizije,
        ciljevi revizije,
        djelokrug (opseg) revizije,
        revidirani subjekt,
        revizor / revizorski tim koji je proveo reviziju,
        odabir uzorka.

        (Ako testiranje nije vršeno na bazi uzorka, brisati dio rečenice koji se odnosi na odabir uzorka.)

        1.2.1 Temelj za provedbu i razdoblje provedbe revizije
        Revizija je planirana Godišnjim planom unutarnje revizije za (upisati godinu) godinu.
        (Ako revizija nije planirana godišnjim planom unutarnje revizije, navesti u tom slučaju drugi temelj za njeno pokretanje).
        Započela je (upisati datum), Nacrt revizijskog izvješća je izdan (upisati datum), a Konačno revizijsko izvješće (upisati datum).
        (Ako je riječ o Nacrtu revizijskog izvješća, brisati dio rečenice koji se odnosi na datum izdavanja Konačnog revizijskog izvješća.)

        1.2.2 Ciljevi revizije
        (Navesti ciljeve revizije)
        1.2.3 Djelokrug (opseg) revizije
        (Navesti djelokrug (opseg) revizije te navesti ograničenja u opsegu revizije ako ih je bilo)
        1.2.4 Revidirani subjekt
        (Navesti organizacijske jedinice Društva HL uključene u revidirani proces)
        1.2.5 Revizor / revizorski tim koji je proveo reviziju
        (Navesti revizora / revizorski tim koji je proveo reviziju)
        1.2.6 Odabir uzorka
        (Ako je testiranje vršeno na bazi uzorka, opisati odabir uzorka, u protivnom brisati ovo poglavlje)
        2. REVIZORSKO MIŠLJENJE
        U sklopu ovog poglavlja izlaže se sljedeće:
        klasifikacijska shema revizorskih mišljenja,
        revizorsko mišljenje,
        sažetak najznačajnijih nalaza i preporuka.
        2.1 KLASIFIKACIJSKA SHEMA REVIZORSKIH MIŠLJENJA
        Revizorska mišljenja klasificiraju se kao:
        zadovoljavajuća – pozitivna,
        zadovoljavajuća uz stanovite nedostatke,
        nezadovoljavajuća – negativna.
        2.1.1 Zadovoljavajuće – pozitivno (revizorsko mišljenje)
        Revizorsko mišljenje zadovoljavajuće – pozitivno Samostalna Služba unutarnje revizije daje kad je revizijom utvrđeno da je sustav unutarnjih kontrola odgovarajući, odnosno pruža razumnu sigurnost da se rizicima upravlja u svrhu ostvarivanja ciljeva.
        Neovisno o davanju zadovoljavajućeg – pozitivnog mišljenja o funkcioniranju sustava unutarnjih kontrola, Samostalna Služba unutarnje revizije ipak može dati neke preporuke (niske važnosti) za poboljšanje.
        2.1.2 Zadovoljavajuće uz stanovite nedostatke (revizorsko mišljenje)
        Revizorsko mišljenje zadovoljavajuće uz stanovite nedostatke Samostalna Služba unutarnje revizije daje kad su revizijom utvrđene slabosti u sustavu unutarnjih kontrola, koje zahtijevaju rješavanje u cilju pružanja razumne sigurnosti da se rizicima upravlja u svrhu ostvarenja ciljeva.
        2.1.3 Nezadovoljavajuće – negativno (revizorsko mišljenje)
        Revizorsko mišljenje nezadovoljavajuće – negativno Samostalna Služba unutarnje revizije daje kad su revizijom utvrđene značajne slabosti u sustavu unutarnjih kontrola, koje zahtijevaju rješavanje u cilju pružanja razumne sigurnosti da se rizicima upravlja u svrhu ostvarenja ciljeva.
        2.2 REVIZORSKO MIŠLJENJE
        (Navesti revizorsko mišljenje o funkcioniranju sustava unutarnjih kontrola u revidiranom području na temelju nalaza i preporuka proizašlih iz obavljanja revizije)

        2.3 SAŽETAK NAJZNAČAJNIJIH NALAZA I PREPORUKA
        (Ukoliko su revizijom utvrđeni nalazi i dane preporuke za njihovo otklanjanje, navesti sažetak najznačajnijih nalaza i preporuka na kojima se revizorsko mišljenje temelji, u protivnom brisati ovo poglavlje)
        3. NALAZI I PREPORUKE
        U sklopu ovog poglavlja izlaže se sljedeće:
        klasifikacijska shema nalaza i preporuka te
        nalazi i preporuke.

        (Ukoliko revizijom nisu utvrđeni nalazi i dane preporuke za njihovo otklanjanje, brisati ovo poglavlje.)
        3.1 KLASIFIKACIJSKA SHEMA NALAZA I PREPORUKA
        Nalazi i preporuke klasificiraju se kao:
        nalazi i preporuke visoke važnosti,
        nalazi i preporuke srednje važnosti,
        nalazi i preporuke niske važnosti.
        3.1.1 Nalazi i preporuke visoke važnosti
        Nalazi i preporuke visoke važnosti su nalazi i preporuke koji se daju zbog značajnih slabosti kontrolnog sustava.
        Provedba preporuka visoke važnosti mora biti hitno realizirana, jer učinak neprovođenja preporuka može imati veće štetne posljedice na poslovanje Agencije.
        3.1.2 Nalazi i preporuke srednje važnosti
        Nalazi i preporuke srednje važnosti su nalazi i preporuke koji se daju zbog otklanjanja slabosti kontrolnog sustava.
        Preporuke srednje važnosti nisu ključne, no još uvijek mogu znatno utjecati na poboljšanja uspostavljenog kontrolnog sustava i stoga zahtijevaju što skoriju realizaciju.
        3.1.3 Nalazi i preporuke niske važnosti
        Nalazi i preporuke niske važnosti su nalazi i preporuke koji se daju zbog otklanjanja manjih slabosti kontrolnog sustava.
        Preporuke niske važnosti ne moraju se nužno odmah provesti, ali se njihova provedba preporučuje zbog daljnjeg poboljšanja uspostavljenog kontrolnog sustava.
        3.2 NALAZI I PREPORUKE
        U sklopu ovog poglavlja izlaže se sljedeće:
        nalazi i preporuke visoke važnosti,
        nalazi i preporuke srednje važnosti,
        nalazi i preporuke niske važnosti.

        (Ukoliko revizijom nisu utvrđeni nalazi određene razine važnosti (npr. visoke važnosti) i dane preporuke za njihovo otklanjanje, brisati pripadajući dio rečenice i pripadajuće poglavlje koje se odnosi na nalaze i preporuke te razine važnosti.)
        3.2.1 Nalazi i preporuke visoke važnosti
        (upisati naslov nalaza)
        Nalaz
        (upisati tekst nalaza)
        Preporuka
        (upisati tekst preporuke)
        4. ZAKLJUČAK
        (Ukratko se referirati se na funkcioniranje kontrolnih mehanizama u revidiranom procesu, utvrđene nalaze i dane preporuke za njihovo otklanjanje (ako je primjenjivo) i na revizorsko mišljenje)
        5. PRILOZI

    </div>
</body>

</html>
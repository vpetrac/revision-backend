<!DOCTYPE html>
<html>

<head>
    <title>Kontrolna lista</title>
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

        h2 {
            font-size: 14px;
            padding-top: 3px;
            padding-bottom: 3px;
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

        .orange {
            background-color: #ffce93;
        }

        .gray {
            background-color: #CDCDCD;
        }
    </style>
</head>

<body>
    <header class="header">
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
                        <td class="tg-cly2" rowspan="4"><strong>OBRAZAC<br>Kontrolna lista</strong></td>
                        <td class="tg-0lax">Klasifikacija</td>
                        <td class="tg-0lax"><span style="font-weight:bold">INTERNO</span></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax" style="max-width: 20px;">Oznaka</td>
                        <td class="tg-0lax"><span style="font-weight:bold">OBR-UNR-05</span></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax">Revizija</td>
                        <td class="tg-0lax"><span style="font-weight:bold">1-05/2022</span></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax">Stranica</td>
                        <td class="tg-0lax"><span style="font-weight:bold">1/4</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </header>
    <div class="report">
        <h1>KONTROLNA LISTA</h1>
        <h2>1. POKRETANJE UNUTARNJE REVIZIJE I FAZA PLANIRANJA</h2>
        <div class="tg-wrap">
            <table class="tg" style="width: 100%;">
                <colgroup>
                    <col style="width: 25px">
                    <col style="width: 338px">
                    <col style="width: 58px">
                    <col style="width: 53px">
                    <col style="width: 53px">
                </colgroup>
                <thead>
                    <tr>
                        <th class="orange" colspan="2">POKRETANJE UNUTARNJE REVIZIJE</th>
                        <th class="orange">DA</th>
                        <th class="orange">NE</th>
                        <th class="orange">N/P</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="gray" colspan="5">B1.1 Otvaranje revizijskog predmeta</th>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td>Je li reviziji dodijeljena oznaka?</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Je li otvoren revizijski predmet u elektroničkom obliku?</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Je li otvoren revizijski predmet u fizičkom obliku?</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>
                            Jesu li u elektronsku verziju Knjige revizija u folderu REVIZIJE upisani
                            podaci o oznaci revizije, nazivu revizije, ur. broj, revizoru/revizorskom
                            timu koji provodi reviziju, superviziji, datumu početka revizije?
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th class="gray" colspan="5">B1.2 Potpisivanje Izjava o neovisnosti</th>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td>
                            Jesu li potpisane Izjave o neovisnosti?
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th class="gray" colspan="5">B1.3 Obavještavanje revidiranog subjekta o početku revizije</th>
                    </tr>
                    <tr>
                        <td>6.</td>
                        <td>
                            Je li revidiranom subjektu poslana obavijest o početku revizije?
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>


            <table class="tg" style="width: 100%;">
                <colgroup>
                    <col style="width: 25px">
                    <col style="width: 338px">
                    <col style="width: 58px">
                    <col style="width: 53px">
                    <col style="width: 53px">
                </colgroup>
                <thead>
                    <tr>
                        <th class="orange" colspan="2">FAZA PLANIRANJA</th>
                        <th class="orange">DA</th>
                        <th class="orange">NE</th>
                        <th class="orange">N/P</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="gray" colspan="5">B2.2 Izrada Opisa procesa</th>
                    </tr>
                    <tr>
                        <td>7.</td>
                        <td>Je li izrađen Opis procesa unutar Plana i programa revizije?</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th class="gray" colspan="5">B2.3 Izrada Preliminarne procjene glavnih rizika</th>
                    </tr>
                    <tr>
                        <td>8.</td>
                        <td>Je li izrađena Preliminarna procjena glavnih rizika?</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th class="gray" colspan="5">B2.4 Izrada Plana i programa revizije</th>
                    </tr>
                    <tr>
                        <td>9.</td>
                        <td>Je li pripremljen Plan i program revizije i je li isti odobren od strane
                            voditelja Samostalne Službe unutarnje revizije?</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>10.</td>
                        <td>
                            Je li u elektronsku verziju Knjige revizija u folderu REVIZIJE upisan
                            podatak o planiranom datumu izdavanja Nacrta revizijskog izvješća?
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>11.</td>
                        <td>
                            Je li generirana elektronska verzija Plana i programa revizije u folderu
                            FAZA IZVJEŠTAVANJA i jesu li u nju upisani podaci o datumima
                            provedbe svih aktivnosti u sklopu pokretanja unutarnje revizije te svih
                            aktivnosti u sklopu faze planiranja?
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <h2>2. FAZA TESTIRANJA </h2>
            <table class="tg" style="width: 100%;">
                <colgroup>
                    <col style="width: 25px">
                    <col style="width: 338px">
                    <col style="width: 58px">
                    <col style="width: 53px">
                    <col style="width: 53px">
                </colgroup>
                <thead>
                    <tr>
                        <th class="orange" colspan="2">FAZA TESTIRANJA</th>
                        <th>DA</th>
                        <th>NE</th>
                        <th>N/P</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="gray" colspan="5">B3.1 Izrada planiranih testova</th>
                    </tr>
                    <tr>
                        <td>12.</td>
                        <td>Jesu li pripremljeni planirani testovi i jesu li isti odobreni od strane
                            voditelja Samostalne Službe unutarnje revizije?</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>13.</td>
                        <td>Jesu li u elektronsku verziju Plana i programa revizije (Prilog 5 Procedure
                            obavljanja pojedinačne unutarnje revizije) u folderu FAZA
                            IZVJEŠTAVANJA upisani podaci o datumu provedbe aktivnosti izrade
                            planiranih testova?</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th class="gray" colspan="5">B3.2 Provedba testiranja</th>
                    </tr>
                    <tr>
                        <td>14.</td>
                        <td>Je li provedeno testiranje, odnosno jesu li rezultati testiranja
                            dokumentirani na Obrascu Program i rezultati testiranja i jesu li isti
                            odobreni od strane voditelja Samostalnog Službe unutarnje revizije,
                            odnosno verificirani od strane supervizora (u slučaju kad je voditelj
                            Samostalne Službe unutarnje revizije samostalno provodio testiranje)?</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>15.</td>
                        <td>
                            Ako se testiranje provodilo na bazi uzorka, je li izrađen Odabir uzorka?
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>16.</td>
                        <td>
                            Jesu li u elektronsku verziju Plana i programa revizije u folderu FAZA
                            IZVJEŠTAVANJA upisani podaci o datumu finalizacije aktivnosti
                            provedbe testiranja?
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th class="gray" colspan="5">B3.3 Potvrđivanje činjenica utvrđenih testiranjem</th>
                    </tr>
                    <tr>
                        <td>17.</td>
                        <td>Je li održavanje sastanka/sastanka potvrđivanja činjenica utvrđenih
                            testiranjem dokumentirano Bilješkom sa sastanka potvrđivanja činjenica
                            ili više njih?</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>18.</td>
                        <td>
                            Ako su prihvaćeni / djelomično prihvaćeni argumenti revidiranog subjekta
                            na kojima on temelji svoje neslaganje u pogledu činjenica utvrđenih
                            testiranjem, jesu li izmijenjeni rezultati testiranja na Obrascu/Obrascima
                            Program i rezultati testiranja i jesu li isti ponovno odobreni od strane
                            voditelja Samostalne Službe unutarnje revizije, odnosno ponovno
                            verificirani od strane supervizora (u slučaju kad je voditelj Samostalne
                            Službe unutarnje revizije samostalno provodio testiranje)?
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>19.</td>
                        <td>
                            Jesu li u elektronsku verziju Plana i programa revizije u folderu FAZA
                            IZVJEŠTAVANJA upisani podaci o datumu finalizacije aktivnosti
                            potvrđivanja činjenica utvrđenih testiranjem?
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th class="gray" colspan="5">B3.4 Formuliranje nalaza, preporuka i revizorskog mišljenja</th>
                    </tr>
                    <tr>
                        <td>20.</td>
                        <td>
                            Jesu li u elektronsku verziju Plana i programa revizije u folderu FAZA
                            IZVJEŠTAVANJA upisani podaci o datumu finalizacije aktivnosti
                            formuliranja nalaza, preporuka i revizorskog mišljenja?
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <h2>3. FAZA IZVJEŠTAVANJA</h2>
            <table class="tg" style="width: 100%;">
                <colgroup>
                    <col style="width: 25px">
                    <col style="width: 338px">
                    <col style="width: 58px">
                    <col style="width: 53px">
                    <col style="width: 53px">
                </colgroup>
                <thead>
                    <tr>
                        <th class="orange" colspan="2">FAZA IZVJEŠTAVANJA</th>
                        <th class="orange">DA</th>
                        <th class="orange">NE</th>
                        <th class="orange">N/P</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="gray" colspan="5">B4.1 Izrada Nacrta revizijskog izvješća</th>
                    </tr>
                    <tr>
                        <td>21.</td>
                        <td>Je li pripremljen Nacrt revizijskog izvješća i je li isti odobren od strane
                            voditelja Samostalne Službe unutarnje revizije?</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>22.</td>
                        <td>Jesu li u elektronsku verziju Plana i programa revizije u folderu FAZA
                            IZVJEŠTAVANJA upisani podaci o datumu provedbe aktivnosti izrade
                            Nacrta revizijskog izvješća?</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th class="gray" colspan="5">B4.2 Dostava Nacrta revizijskog izvješća</th>
                    </tr>
                    <tr>
                        <td>23.</td>
                        <td>Je li Nacrt revizijskog izvješća dostavljen revidiranom subjektu?</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>24.</td>
                        <td>
                            Je li u elektronsku verziju Knjige revizija u folderu REVIZIJE upisan
                            podatak o datumu izdavanja Nacrta revizijskog izvješća?
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>25.</td>
                        <td>
                            Jesu li u elektronsku verziju Plana i programa revizije u folderu FAZA
                            IZVJEŠTAVANJA upisani podaci o datumu provedbe aktivnosti izdavanja
                            Nacrta revizijskog izvješća?
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th class="gray" colspan="5">B4.3 Usuglašavanje Nacrta revizijskog izvješća s revidiranim subjektom</th>
                    </tr>
                    <tr>
                        <td>26.</td>
                        <td>Je li održavanje završnog sastanka dokumentirano Bilješkom sa
                            završnog sastanka?</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>27.</td>
                        <td>
                            Ako su prihvaćeni / djelomično prihvaćeni argumenti revidiranog subjekta
                            na kojima on temelji svoje neslaganje u pogledu nalaza i preporuka, je li
                            Nacrt revizijskog izvješća izmijenjen, ponovno odobren od strane
                            voditelja Samostalne Službe unutarnje revizije i je li izvršena njegova
                            ponovna dostava svim primateljima kojima je poslana i inicijalna verzija?
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>28.</td>
                        <td>
                            Jesu li u elektronsku verziju Plana i programa revizije u folderu FAZA
                            IZVJEŠTAVANJA upisani podaci o datumu provedbe aktivnosti
                            usuglašavanja Nacrta revizijskog izvješća s revidiranim subjektom?
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th class="gray" colspan="5">B4.4 Izrada Konačnog revizijskog izvješća</th>
                    </tr>
                    <tr>
                        <td>29.</td>
                        <td>
                            Je li pripremljeno Konačno revizijsko izvješće i je li isto odobreno od
                            strane voditelja Samostalne Službe unutarnje revizije?
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>30.</td>
                        <td>
                            Jesu li u elektronsku verziju Plana i programa revizije u folderu FAZA
                            IZVJEŠTAVANJA upisani podaci o datumu provedbe aktivnosti izrade
                            Konačnog revizijskog izvješća?
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th class="gray" colspan="5">B4.5 Izdavanje Konačnog revizijskog izvješća</th>
                    </tr>
                    <tr>
                        <td>31.</td>
                        <td>
                            Je li Konačno revizijsko izvješće dostavljeno revidiranom subjektu?
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>32.</td>
                        <td>
                            Jesu li u elektronsku verziju Plana i programa revizije u folderu FAZA
                            IZVJEŠTAVANJA upisani podaci o datumu provedbe aktivnosti izdavanja
                            Konačnog revizijskog izvješća i je li finalizirana verzija Plana i programa
                            revizije potpisana i spremljena u revizijski predmet?
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>33.</td>
                        <td>
                            Jesu li u elektronsku verziju Knjige revizija u folderu REVIZIJE upisani
                            podaci o datumu završetka revizije, datumu izdavanja Konačnog
                            revizijskog izvješća, ukupnom broju preporuka i njihovoj strukturi po
                            važnosti i statusu prihvaćanja, rokovima provedbe preporuka (datumima
                            iz Plana djelovanja)?
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <h2>4. FAZA PRAĆENJA PROVEDBE PREPORUKA</h2>
            <table class="tg" style="width: 100%;">
                <colgroup>
                    <col style="width: 25px">
                    <col style="width: 338px">
                    <col style="width: 58px">
                    <col style="width: 53px">
                    <col style="width: 53px">
                </colgroup>
                <thead>
                    <tr>
                        <th class="orange" colspan="2">FAZA PLANIRANJA</th>
                        <th class="orange">DA</th>
                        <th class="orange">NE</th>
                        <th class="orange">N/P</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="gray" colspan="5">B5.1 Obavljanje praćenja provedbe preporuka</th>
                    </tr>
                    <tr>
                        <td>34.</td>
                        <td>Jesu li u elektronsku verziju Registra preporuka u folderu REVIZIJE
                            upisani podaci o provedenim aktivnostima od strane rukovodstva,
                            statusima provedbe preporuka, napomenama, odnosno razlozima
                            kašnjenja provedbe preporuka (ako je primjenjivo)?</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>35.</td>
                        <td>Jesu li u elektronsku verziju Knjige revizija u folderu REVIZIJE upisani
                            podaci o datumu početka praćenja provedbe preporuka te ukupnom broju
                            praćenih preporuka i njihovoj strukturi po važnosti i statusu provedbe?</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th class="gray" colspan="5">B5.2 Izvještavanje o praćenju provedbe preporuka</th>
                    </tr>
                    <tr>
                        <td>36.</td>
                        <td>Je li pripremljeno Izvješće o praćenju provedbe preporuka (Baza
                            preporuka) i je li isto odobreno od strane voditelja Samostalne Službe
                            unutarnje revizije?</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>37.</td>
                        <td>
                            Je li Izvješće o praćenju provedbe preporuka (Baza preporuka)
                            dostavljeno Upravi Društva i Revizijskom odboru Društva?
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>38.</td>
                        <td>
                            Jesu li u elektronsku verziju Knjige revizija u folderu REVIZIJE upisani
                            podaci o datumu izdavanja Izvješća o praćenju provedbe preporuka
                            (Baza preporuka), datumu završetka praćenja provedbe preporuka, broju
                            preporuka koje je potrebno dalje pratiti?
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <table class="tg" style="width: 100%; max-width:100;">
                <colgroup>
                    <col style="width: 80px">
                    <col style="width: 95px">
                    <col style="width: 104px">
                    <col style="width: 122px">
                    <col style="width: 134px">
                </colgroup>
                <thead>
                    <tr>
                        <th></th>
                        <th>Datum:</th>
                        <th>Ime i prezime:</th>
                        <th>Funkcija:</th>
                        <th>Potpis:</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Voditelj revizijskog tima:</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Supervizor revizijskog tima:</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

        </div>

</body>

</html>
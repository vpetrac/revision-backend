<!DOCTYPE html>
<html>

<head>
    <title>Konačno revizijsko izvješće
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        @page {
            size: A4 portrait;

            margin: 25px 40px;
            margin-top: 200px;
        }

        header {
            position: fixed;
            top: -150px;
            height: 140px;
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

        h1,
        h2,
        h3,
        h4 {
            font-size: 16px;
        }

        p,
        li {
            font-size: 13px !important;
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

        .front {
            height: 600px;
        }

        .front .top {
            width: 100%;
            text-align: center;
            margin-top: 35%;
        }

        td img {
            max-width: 100%;
            height: auto;
        }

        img {
            max-width: 100%;
            height: auto;
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
                        <td class="tg-cly1" rowspan="4"><img style="width: 100px; height: auto;" src="{{ storage_path('/app/public/logos/app-logo.png') }}" alt=""></td>
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
    </header>

    <div class="front">
        <div class="top">
            <h1>Izvješće unutarnje revizije</h1>
            <h1>{{$revision->name}}</h1>
        </div>
        <p style="text-align: center; margin-top: 40%">
            Urbroj: {{$report->reference_number}}<br><br>
            Zagreb,<br>
            {{ !empty($report->draft_date) ? \Carbon\Carbon::parse($report->draft_date)->format('d.m.Y') : '' }}

        </p>
    </div>
    <div style="page-break-after: always;"></div>
    <div class="sadrzaj">

    </div>
    <div class="upr-sazetak">
        <h2>UPRAVLJAČKI SAŽETAK</h2>
        <div>
            {!! $report->management_summary !!}
        </div>
    </div>
    <div style="page-break-after: always;"></div>
    <div id="uvod">
        <div>
            <h2>1. UVOD</h2>
        </div>
        <div>
            <h3>1.1 INFORMACIJE O POSLOVNOM PROCESU KOJI JE BIO PREDMETOM REVIZIJE</h3>
        </div>
        <div>
            <h3>1.1.1 Poslovni cilj procesa</h3>
            <div>{!! $report->process_business_goal !!}</div>
        </div>
        <div>
            <h3>1.1.2 Opis procesa</h3>
            <div>{!! $report->process_description !!}</div>
        </div>
        <div>
            <h3>1.1.3 Glavni rizici</h3>
            <ul style="list-style: none;">
                @foreach ($revision->programs as $program)
                <li>{{$loop->index + 1}}. {{$program->risk_description}}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <div style="page-break-after: always;"></div>
    <div>
        <div>
            <h2>1.2 INFORMACIJE O PROVEDENOJ REVIZIJI</h2>
            <p> U sklopu ovog poglavlja izlaže se sljedeće: temelj za provedbu i razdoblje provedbe revizije, ciljevi revizije,
                djelokrug (opseg) revizije, revidirani subjekt, revizor / revizorski tim koji je proveo reviziju, odabir uzorka.</p>
        </div>
        <div>
            <h3>1.2.1 Temelj za provedbu i razdoblje provedbe revizije</h3>
            <div>
                {!! $report->basis_for_implementation_and_audit_period !!}
            </div>
        </div>
        <div>
            <h3>1.2.2 Ciljevi revizije</h3>
            <div>{!! $revision->revision_goals_descrption !!}</div>
            <ul style="list-style: none;">
                @foreach ($revision->goals as $goal)
                <li>{{$loop->index + 1}}. {{$goal->name}}</li>
                @endforeach
            </ul>
        </div>
        <div>
            <h3>1.2.3 Djelokrug (opseg) revizije</h3>
            <div>{!! $revision->revision_scope !!}</div>
        </div>
        <div>
            <h3>1.2.4 Revidirani subjekt</h3>
            <p>@php
                $auditTeamMembers = json_decode($revision->auditTeamMembers, true);
                $subjectNames = array_column($auditTeamMembers, 'label');
                @endphp
                {{ implode(', ', $subjectNames) }}
            </p>
        </div>
        <div>
            <h3>1.2.5 Revizor / revizorski tim koji je proveo reviziju</h3>
            <p>Voditelj revizijskog tima:<br>
                {{$revision->auditTeamHead}}
            </p>
            <p>Članovi revizijskog tima:<br>
                @php
                $subjects = json_decode($revision->subjects, true);
                $subjectNames = array_column($subjects, 'label');
                @endphp
                {{ implode(', ', $subjectNames) }}
            </p>
        </div>
        <div>
            <h3>1.2.6 Odabir uzorka</h3>
            <table class="tg" style="width: 100%;">
                <thead>
                    <tr>
                        <th style="font-weight: bold; font-size: 12px; background-color: #ffce93;">Naziv</th>
                        <th style="font-weight: bold; font-size: 12px; background-color: #ffce93;">Populacija</th>
                        <th style="font-weight: bold; font-size: 12px; background-color: #ffce93;">Vrsta uzorkovanja</th>
                        <th style="font-weight: bold; font-size: 12px; background-color: #ffce93;">Veličina uzorka</th>
                        <th style="font-weight: bold; font-size: 12px; background-color: #ffce93;">Metoda odabira revizijskog uzorka</th>
                        <th style="font-weight: bold; font-size: 12px; background-color: #ffce93;">Objašnjenje</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($revision->samples as $sample)
                    <tr>
                        <td>{{$sample->sample_name}}</td>
                        <td>{{$sample->population_size}}</td>
                        <td>{{$sample->sampling_method}}</td>
                        <td>{{$sample->sample_size}}</td>
                        <td>{{$sample->collection_method}}</td>
                        <td>{{$sample->method_explanation}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div style="page-break-after: always;"></div>
    <div>
        <div>
            <h2>2. REVIZORSKO MIŠLJENJE</h2>
            <p>U sklopu ovog poglavlja izlaže se sljedeće:
                klasifikacijska shema revizorskih mišljenja,
                revizorsko mišljenje,
                sažetak najznačajnijih nalaza i preporuka.</p>
        </div>
        <div>
            <h3>2.1 KLASIFIKACIJSKA SHEMA REVIZORSKIH MIŠLJENJA</h3>
            <p>Revizorska mišljenja klasificiraju se kao:
                zadovoljavajuća – pozitivna,
                zadovoljavajuća uz stanovite nedostatke,
                nezadovoljavajuća – negativna.</p>
        </div>
        <div>
            <h3>2.1.1 Zadovoljavajuće – pozitivno (revizorsko mišljenje)</h3>
            <p>
                Revizorsko mišljenje zadovoljavajuće – pozitivno Samostalna Služba unutarnje revizije daje kad je revizijom utvrđeno da je sustav unutarnjih kontrola odgovarajući, odnosno pruža razumnu sigurnost da se rizicima upravlja u svrhu ostvarivanja ciljeva.<br>
                Neovisno o davanju zadovoljavajućeg – pozitivnog mišljenja o funkcioniranju sustava unutarnjih kontrola, Samostalna Služba unutarnje revizije ipak može dati neke preporuke (niske važnosti) za poboljšanje.
            </p>
        </div>
        <div>
            <h3>2.1.2 Zadovoljavajuće uz stanovite nedostatke (revizorsko mišljenje)</h3>
            <p>
                Revizorsko mišljenje zadovoljavajuće uz stanovite nedostatke Samostalna Služba unutarnje revizije daje kad su revizijom utvrđene slabosti u sustavu unutarnjih kontrola, koje zahtijevaju rješavanje u cilju pružanja razumne sigurnosti da se rizicima upravlja u svrhu ostvarenja ciljeva.
            </p>
        </div>
        <div>
            <h3>2.1.3 Nezadovoljavajuće – negativno (revizorsko mišljenje)</h3>
            <p>
                Revizorsko mišljenje nezadovoljavajuće – negativno Samostalna Služba unutarnje revizije daje kad su revizijom utvrđene značajne slabosti u sustavu unutarnjih kontrola, koje zahtijevaju rješavanje u cilju pružanja razumne sigurnosti da se rizicima upravlja u svrhu ostvarenja ciljeva.
            </p>
        </div>
        <div>
            <h2>2.2 REVIZORSKO MIŠLJENJE</h2>
            <div>{!! $report->audit_opinion !!}</div>
        </div>
        <div>
            <h2>2.3 SAŽETAK NAJZNAČAJNIJIH NALAZA I PREPORUKA</h2>
            <div>{!! $report->summary_of_significant_findings_and_recommendations !!}</div>
        </div>
    </div>
    <div style="page-break-after: always;"></div>
    <div>
        <div>
            <h2>3. NALAZI I PREPORUKE</h2>
            <p>U sklopu ovog poglavlja izlaže se sljedeće:
            <ul>
                <li>klasifikacijska shema nalaza i preporuka te</li>
                <li>nalazi i preporuke.</li>
            </ul>
            </p>

        </div>
        <div>
            <h2>3.1 KLASIFIKACIJSKA SHEMA NALAZA I PREPORUKA</h2>
            <p>Nalazi i preporuke klasificiraju se kao:
            <ul>
                <li>nalazi i preporuke visoke važnosti,</li>
                <li>nalazi i preporuke srednje važnosti,</li>
                <li>nalazi i preporuke niske važnosti,</li>
            </ul>
            </p>
        </div>
        <div>
            <h3>3.1.1 Nalazi i preporuke visoke važnosti</h3>
            <p>
                Nalazi i preporuke visoke važnosti su nalazi i preporuke koji se daju zbog značajnih slabosti kontrolnog sustava.<br>
                Provedba preporuka visoke važnosti mora biti hitno realizirana, jer učinak neprovođenja preporuka može imati veće štetne posljedice na poslovanje Agencije.
            </p>
        </div>
        <div>
            <h3>3.1.2 Nalazi i preporuke srednje važnosti</h3>
            <p>
                Nalazi i preporuke srednje važnosti su nalazi i preporuke koji se daju zbog otklanjanja slabosti kontrolnog sustava.<br>
                Preporuke srednje važnosti nisu ključne, no još uvijek mogu znatno utjecati na poboljšanja uspostavljenog kontrolnog sustava i stoga zahtijevaju što skoriju realizaciju.
            </p>
        </div>
        <div>
            <h3>3.1.3 Nalazi i preporuke niske važnosti</h3>
            <p>
                Nalazi i preporuke niske važnosti su nalazi i preporuke koji se daju zbog otklanjanja manjih slabosti kontrolnog sustava.<br>
                Preporuke niske važnosti ne moraju se nužno odmah provesti, ali se njihova provedba preporučuje zbog daljnjeg poboljšanja uspostavljenog kontrolnog sustava.
            </p>
        </div>
        <div>
            <h2>3.2 NALAZI I PREPORUKE</h2>
            <p>U sklopu ovog poglavlja izlaže se sljedeće:
            <ul>
                <li>nalazi i preporuke visoke važnosti,</li>
                <li>nalazi i preporuke srednje važnosti,</li>
                <li>nalazi i preporuke niske važnosti,</li>
            </ul>
            </p>
        </div>
        <div>
            <h2>3.2.1 Nalazi i preporuke visoke važnosti</h2>
            @foreach ($findings as $finding)
            @if($finding->recommendations->contains('importance', 1))
            <div>
                <span>Nalaz</span>
                <p style="margin-top: 0">{!! $finding->name !!}</p>
                @foreach ($finding->recommendations as $recommendation)
                @if ($recommendation->importance == 1)
                <div>
                    <span>Preporuka</span>
                    <p style="margin-top: 0">{!! $recommendation->content !!}</p>
                </div>
                @endif
                @endforeach
            </div>
            @endif
            @endforeach
        </div>

        <div>
            <h2>3.2.2 Nalazi i preporuke srednje važnosti</h2>
            @foreach ($findings as $finding)
            @if($finding->recommendations->contains('importance', 2))
            <div>
                <span>Nalaz</span>
                <p>{!! $finding->name !!}</p>
                @foreach ($finding->recommendations as $recommendation)
                @if ($recommendation->importance == 2)
                <div>
                    <span>Preporuka</span>
                    <p>{!! $recommendation->content !!}</p>
                </div>
                @endif
                @endforeach
            </div>
            @endif
            @endforeach
        </div>

        <div>
            <h2>3.2.3 Nalazi i preporuke niske važnosti</h2>
            @foreach ($findings as $finding)
            @if($finding->recommendations->contains('importance', 3))
            <div>
                <span>Nalaz</span>
                <p>{!! $finding->name !!}</p>
                @foreach ($finding->recommendations as $recommendation)
                @if ($recommendation->importance == 3)
                <div>
                    <span>Preporuka</span>
                    <p>{!! $recommendation->content !!}</p>
                </div>
                @endif
                @endforeach
            </div>
            @endif
            @endforeach
        </div>
    </div>
    <div style="page-break-after: always;"></div>
    <div>
        <h2>4. ZAKLJUČAK</h2>
        <div>
            {!! $report->management_summary !!}
        </div>
        <table style="width: 100%; font-size: 14px; margin-top: 100px;">
            <tr>
                <td>Izvješće sastavio/la:</td>
                <td></td>
                <td>Izvješće odobrio/la:</td>
            </tr>
            <tr>
                <td style="height: 100px; border-bottom: 1px solid #000;">Unutarnji/a revizor/ica </td>
                <td style="width: 100px;"></td>
                <td style="border-bottom: 1px solid #000;">Voditelj/ica Samostalne<br>Službe unutarnje revizije</td>
            </tr>
        </table>
    </div>
</body>

</html>
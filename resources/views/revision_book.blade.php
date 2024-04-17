<!DOCTYPE html>
<html>

<head>
    <title>Knjiga revizija</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        @page {
            size: A2 landscape;
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
            font-size: 10px;
            overflow: hidden;
            padding: 3px 10px;
        }

        .tg th {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-size: 10px;
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
            width: 340px;
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
            border-color: black;
            border-style: solid;
            border-width: 1px;

            font-size: 10px;
            padding: 5px 5px;
        }

        .report .tg th {
            border-color: black;
            border-style: solid;
            border-width: 1px;

            font-size: 10px;
            font-weight: normal;
            padding: 5px 5px;
        }

        .report .tg .upper-header {
            background-color: #ffce93;
            border-color: black;
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
                        <td class="tg-cly1" rowspan="4"><img style="width: 100px; height: auto;" src="{{ storage_path('/app/public/logos/app-logo.png') }}" alt=""></td>
                        <td class="tg-cly2" rowspan="4"><strong>OBRAZAC<br>Knjiga revizija</strong></td>
                        <td class="tg-0lax">Klasifikacija</td>
                        <td class="tg-0lax"><span style="font-weight:bold">INTERNO</span></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax" style="max-width: 20px;">Oznaka</td>
                        <td class="tg-0lax"><span style="font-weight:bold">OBR-UNR-03</span></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax">Revizija</td>
                        <td class="tg-0lax"><span style="font-weight:bold">1-05/2022</span></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax">Stranica</td>
                        <td class="tg-0lax"><span style="font-weight:bold">1/1</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="report">
        <h1>KNJIGA REVIZIJA</h1>

        <div class="ritz grid-container" dir="ltr">
            <table class="tg" style="width: 100%;">
                <tbody>
                    <tr style="background-color: #bcd4c3;">
                        <td class="s0" dir="ltr" rowspan="3">R.B</td>
                        <td class="s0" dir="ltr" rowspan="3">OZNAKA REVIZIJE</td>
                        <td class="s0" dir="ltr" rowspan="3">NAZIV REVIZIJE</td>
                        <td class="s0" dir="ltr" rowspan="3">UR. BROJ (konačno izvješće)</td>
                        <td class="s0" dir="ltr" rowspan="3">REVIZOR / REVIZORSKI TIM</td>
                        <td class="s0" dir="ltr" rowspan="3">SUPERVIZIJA</td>
                        <td class="s0" dir="ltr" colspan="2" rowspan="2">RAZDOBLJE TRAJANJA REVIZIJE</td>
                        <td class="s0" dir="ltr" colspan="2" rowspan="2">DATUM REALIZACIJE NACRTA REVIZIJSKOG IZVJEŠĆA</td>
                        <td class="s0" dir="ltr" rowspan="3">DATUM IZDAVANJA KONAČNOG REVIZIJSKOG IZVJEŠĆA(datum sa
                            Odluke-odobrenje Uprave)</td>
                        <td class="s0" dir="ltr" rowspan="3">UKUPNO PREPORUKA</td>
                        <td class="s0" dir="ltr" colspan="6">BROJ DANIH PREPORUKA</td>
                        <td class="s0" dir="ltr" rowspan="3">ROKOVI PROVEDBE PREPORUKE(datumi iz Plana djelovanja)</td>
                        <td class="s0" dir="ltr" colspan="19">PRAĆENJE PREPORUKE</td>
                    </tr>
                    <tr style="background-color: #bcd4c3;">
                        <td class="s0" dir="ltr" colspan="2">Visoki važnost (V)</td>
                        <td class="s0" dir="ltr" colspan="2">Srednja važnost (S)</td>
                        <td class="s0" dir="ltr" colspan="2">Niska važnost (N)</td>
                        <td class="s0" dir="ltr" rowspan="2">Početak praćenja</td>
                        <td class="s0" dir="ltr" rowspan="2">Završetak praćenja</td>
                        <td class="s0" dir="ltr" rowspan="2">DATUMI PROVEDBE PREPORUKE</td>
                        <td class="s0" dir="ltr" colspan="3">Broj praćenih preporuka</td>
                        <td class="s0" dir="ltr" colspan="3">Broj provedenih preporuka</td>
                        <td class="s0" dir="ltr" colspan="3">Broj djelomično provedenih preporuka</td>
                        <td class="s0" dir="ltr" colspan="3">Broj neprovedenih preporuka</td>
                        <td class="s0" dir="ltr" colspan="3">Broj preporuka koje više nisu relevantne</td>
                        <td rowspan="2" class="s1 softmerge" dir="ltr">Broj preporuka koje je potrebno dalje
                            pratiti
                        </td>
                    </tr>
                    <tr style="background-color: #bcd4c3;">
                        <td class="s1 softmerge" dir="ltr">
                            <div class="softmerge-inner" style="width:200px;left:-104px">Početak(datum slanja obavijesti o
                                početku revizije)</div>
                        </td>
                        <td class="s2 softmerge" dir="ltr">
                            <div class="softmerge-inner" style="width:99px;left:-3px">Završetak(datum izrade Odluke-Konačno
                                izvješće</div>
                        </td>
                        <td class="s0" dir="ltr">Planirani</td>
                        <td class="s0" dir="ltr">Ostvareni</td>
                        <td class="s0" dir="ltr">Ukupno V</td>
                        <td class="s0" dir="ltr">Prihvaćeno</td>
                        <td class="s0" dir="ltr">Ukupno S</td>
                        <td class="s0" dir="ltr">Prihvaćeno</td>
                        <td class="s0" dir="ltr">Ukupno N</td>
                        <td class="s0" dir="ltr">Prihvaćeno</td>
                        <td class="s0" dir="ltr">V</td>
                        <td class="s0" dir="ltr">S</td>
                        <td class="s0" dir="ltr">N</td>
                        <td class="s0" dir="ltr">V</td>
                        <td class="s0" dir="ltr">S</td>
                        <td class="s0" dir="ltr">N</td>
                        <td class="s0" dir="ltr">V</td>
                        <td class="s0" dir="ltr">S</td>
                        <td class="s0" dir="ltr">N</td>
                        <td class="s0" dir="ltr">V</td>
                        <td class="s0" dir="ltr">S</td>
                        <td class="s0" dir="ltr">N</td>
                        <td class="s0" dir="ltr">V</td>
                        <td class="s0" dir="ltr">S</td>
                        <td class="s0" dir="ltr">N</td>

                    </tr>
                    @foreach($revisions as $revision)
                    <tr>
                        <td class="s3">{{$loop->index + 1}}.</td>
                        <td class="s3">{{$revision->code}}</td>
                        <td class="s3">{{$revision->name}}</td>
                        <td class="s3"></td>
                        <td class="s3">{{$revision->auditTeamHead}}<br><br>
                            @php
                            $subjects = json_decode($revision->subjects, true);
                            $subjectNames = array_column($subjects, 'label');
                            @endphp
                            {{ implode(', ', $subjectNames) }}
                        </td>
                        <td class="s3">{{$revision->supervisor}}</td>
                        <td class="s3">{{ !empty($revision->actual_start_of_internal_revision) ? \Carbon\Carbon::parse($revision->actual_start_of_internal_revision)->format('d.m.Y') : '' }}</td>
                        <td class="s3">{{ !empty($revision->actual_final_revision_report) ? \Carbon\Carbon::parse($revision->actual_final_revision_report)->format('d.m.Y') : '' }}</td>
                        <td class="s3">{{ !empty($revision->planned_draft_of_revision_report) ? \Carbon\Carbon::parse($revision->planned_draft_of_revision_report)->format('d.m.Y') : '' }}</td>
                        <td class="s3">{{ !empty($revision->actual_draft_of_revision_report) ? \Carbon\Carbon::parse($revision->actual_draft_of_revision_report)->format('d.m.Y') : '' }}</td>
                        <td class="s3">{{ !empty($revision->actual_final_revision_report) ? \Carbon\Carbon::parse($revision->actual_final_revision_report)->format('d.m.Y') : '' }}</td>
                        <td class="s3">{{ $revision->recommendations->count() }}</td>
                        <td class="s3">
                            {{ $revision->recommendations->where('importance', '3')->count() }}
                        </td>
                        <td class="s3"></td>
                        <td class="s3">
                            {{ $revision->recommendations->where('importance', '2')->count() }}
                        </td>
                        <td class="s3"></td>
                        <td class="s3">
                            {{ $revision->recommendations->where('importance', '1')->count() }}
                        </td>
                        <td class="s3"></td>
                        <td class="s3"></td>
                        <td class="s3"></td>
                        <td class="s3"></td>
                        <td class="s3"></td>
                        <td class="s3"></td>
                        <td class="s3"></td>
                        <td class="s3"></td>
                        <td class="s3"></td>
                        <td class="s3"></td>
                        <td class="s3"></td>
                        <td class="s3"></td>
                        <td class="s3"></td>
                        <td class="s3"></td>
                        <td class="s3"></td>
                        <td class="s3"></td>
                        <td class="s3"></td>
                        <td class="s3"></td>
                        <td class="s3"></td>
                        <td class="s3"></td>
                        <td class="s3"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

</body>

</html>
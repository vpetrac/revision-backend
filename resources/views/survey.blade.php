@foreach ($surveys as $survey)

<!DOCTYPE html>
<html>

<head>
    <title>Upitnik za revidirani subjekt</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        @page {
            size: A4 portrait;

            margin: 25px 40px;
            margin-top: 150px;
        }

        .header {
            position: fixed;
            top: -120px;
            height: 140px;
        }

        * {
            font-family: DejaVu Sans;
        }

        body {

            margin: 0;
        }

        h1 {
            font-size: 16px;
            padding-top: 6px;
            padding-bottom: 6px;
        }

        span {
            font-size: 10px;
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
            font-size: 11px;
            overflow: hidden;
            padding: 3px 10px;
        }

        .tg th {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-size: 11px;
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

            font-size: 11px;
            padding: 5px 5px;
        }

        .report .tg th {
            border-color: #d3d3d3;
            border-style: solid;
            border-width: 1px;

            font-size: 11px;
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
    <div class="header">
        <div class="tg-wrap">
            <table class="tg" style="width: 100%; max-width:100;">
                <colgroup>
                    <col style="width: 50px">
                    <col style="width: 800px">
                    <col style="width: 40px">
                    <col style="width: 40px">
                </colgroup>
                <tbody>
                    <tr>
                        <td class="tg-cly1" rowspan="4"><img style="width: 100px; height: auto;" src="{{ storage_path('/app/public/logos/app-logo.png') }}" alt=""></td>
                        <td class="tg-cly2" rowspan="4"><strong>OBRAZAC<br>Upitnik za revidirani subjekt</strong></td>
                        <td class="tg-0lax">Klasifikacija</td>
                        <td class="tg-0lax"><span style="font-weight:bold">INTERNO</span></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax" style="max-width: 20px;">Oznaka</td>
                        <td class="tg-0lax"><span style="font-weight:bold">OBR-UNR-13</span></td>
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
        <h1>UPITNIK ZA REVIDIRANI SUBJEKT<br>PROGRAM OSIGURANJA KVALITETE I UNAPRJEĐENJA</h1>
        <p style="font-size: 14px;">Molimo ocijenite Samostalnu Službu unutarnje revizije u sljedećim područjima te zaokružite / označite samo jedan broj (ocjenu) po odgovoru.
        </p>
        <div class="tg-wrap">
            <table class="tg" style="width: 100%; max-width:100;">
                <thead>
                    <tr>
                        <th class="upper-header" colspan="2">OPĆI PODACI O REVIZIJI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Naziv revizije</td>
                        <td>{{$revision->name}}</td>
                    </tr>
                    <tr>
                        <td>Oznaka iz Godišnjeg plana / šifra revizije</td>
                        <td>{{$revision->code}}</td>
                    </tr>
                </tbody>
            </table>
            @php
            $content = $survey->content;
            @endphp
            <table class="tg" style="width: 100%; max-width:100;">
                <thead>
                    <tr>
                        <th class="orange" colspan="6">UPITNIK</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td>VD</td>
                        <td>D</td>
                        <td>Z</td>
                        <td>L</td>
                        <td>N/P</td>
                    </tr>
                    <tr>
                        <td class="gray" colspan="6">ODNOS S REVIDIRANIM SUBJEKTOM</td>
                    </tr>
                    <tr>
                        <td>1. Ocijenite suradnju unutarnje revizije s revidiranim subjektom</td>
                        <td>@if ($content[0]['answer'] == '4') X @else &nbsp; @endif</td>
                        <td>@if ($content[0]['answer'] == '3') X @else &nbsp; @endif</td>
                        <td>@if ($content[0]['answer'] == '2') X @else &nbsp; @endif</td>
                        <td>@if ($content[0]['answer'] == '1') X @else &nbsp; @endif</td>
                        <td>@if ($content[0]['answer'] == '0') X @else &nbsp; @endif</td>
                    </tr>
                    <tr>
                        <td>2. Tijekom obavljanja revizije unutarnjim revizorima smo omogućili neograničeno pravo pristupa cjelokupnoj dokumentaciji, podacima i informacijama (na svim nositeljima podataka) te rukovoditeljima revidiranog subjekta, zaposlenicima i materijalnoj imovini</td>
                        <td>@if ($content[1]['answer'] == '4') X @else &nbsp; @endif</td>
                        <td>@if ($content[1]['answer'] == '3') X @else &nbsp; @endif</td>
                        <td>@if ($content[1]['answer'] == '2') X @else &nbsp; @endif</td>
                        <td>@if ($content[1]['answer'] == '1') X @else &nbsp; @endif</td>
                        <td>@if ($content[1]['answer'] == '0') X @else &nbsp; @endif</td>
                    </tr>
                    <tr>
                        <td>3. Unutarnja revizija prilikom obavljanja revizije je stručno, savjesno obavila revizijski rad</td>
                        <td>@if ($content[2]['answer'] == '4') X @else &nbsp; @endif</td>
                        <td>@if ($content[2]['answer'] == '3') X @else &nbsp; @endif</td>
                        <td>@if ($content[2]['answer'] == '2') X @else &nbsp; @endif</td>
                        <td>@if ($content[2]['answer'] == '1') X @else &nbsp; @endif</td>
                        <td>@if ($content[2]['answer'] == '0') X @else &nbsp; @endif</td>
                    </tr>
                    <tr>
                        <td class="gray" colspan="6">UNUTARNJI REVIZORI</td>
                    </tr>
                    <tr>
                        <td>4. Objektivnost unutarnjih revizora</td>
                        <td>@if ($content[3]['answer'] == '4') X @else &nbsp; @endif</td>
                        <td>@if ($content[3]['answer'] == '3') X @else &nbsp; @endif</td>
                        <td>@if ($content[3]['answer'] == '2') X @else &nbsp; @endif</td>
                        <td>@if ($content[3]['answer'] == '1') X @else &nbsp; @endif</td>
                        <td>@if ($content[3]['answer'] == '0') X @else &nbsp; @endif</td>
                    </tr>
                    <tr>
                        <td>5. Profesionalizam unutarnjih revizora</td>
                        <td>@if ($content[4]['answer'] == '4') X @else &nbsp; @endif</td>
                        <td>@if ($content[4]['answer'] == '3') X @else &nbsp; @endif</td>
                        <td>@if ($content[4]['answer'] == '2') X @else &nbsp; @endif</td>
                        <td>@if ($content[4]['answer'] == '1') X @else &nbsp; @endif</td>
                        <td>@if ($content[4]['answer'] == '0') X @else &nbsp; @endif</td>
                    </tr>
                    <tr>
                        <td>6. Revizorski tim razumije moje procese i ima dostatno znanje o istima za provođenje revizije</td>
                        <td>@if ($content[5]['answer'] == '5') X @else &nbsp; @endif</td>
                        <td>@if ($content[5]['answer'] == '4') X @else &nbsp; @endif</td>
                        <td>@if ($content[5]['answer'] == '3') X @else &nbsp; @endif</td>
                        <td>@if ($content[5]['answer'] == '2') X @else &nbsp; @endif</td>
                        <td>@if ($content[5]['answer'] == '1') X @else &nbsp; @endif</td>
                    <tr>
                        <td>7. Revizorski tim je fleksibilan za vrijeme obavljanja revizije i revizori imaju izražene interpersonalne vještine</td>
                        <td>@if ($content[6]['answer'] == '4') X @else &nbsp; @endif</td>
                        <td>@if ($content[6]['answer'] == '3') X @else &nbsp; @endif</td>
                        <td>@if ($content[6]['answer'] == '2') X @else &nbsp; @endif</td>
                        <td>@if ($content[6]['answer'] == '1') X @else &nbsp; @endif</td>
                        <td>@if ($content[6]['answer'] == '0') X @else &nbsp; @endif</td>
                    </tr>
                    <tr>
                        <td>8. Revizorski tim je pokazao profesionalnost, ljubaznost i konstruktivan i pozitivan pristup te je bio u mogućnosti uspostaviti učinkovite odnose s osobljem</td>
                        <td>@if ($content[7]['answer'] == '4') X @else &nbsp; @endif</td>
                        <td>@if ($content[7]['answer'] == '3') X @else &nbsp; @endif</td>
                        <td>@if ($content[7]['answer'] == '2') X @else &nbsp; @endif</td>
                        <td>@if ($content[7]['answer'] == '1') X @else &nbsp; @endif</td>
                        <td>@if ($content[7]['answer'] == '0') X @else &nbsp; @endif</td>
                    </tr>
                    <tr>
                        <td class="gray" colspan="6">REVIZIJSKI PROCES I IZVJEŠĆE</td>
                    </tr>
                    <tr>
                        <td>9. Ciljevi, opseg, trajanje te metode obavljanja revizije su jasno priopćeni</td>
                        <td>@if ($content[8]['answer'] == '4') X @else &nbsp; @endif</td>
                        <td>@if ($content[8]['answer'] == '3') X @else &nbsp; @endif</td>
                        <td>@if ($content[8]['answer'] == '2') X @else &nbsp; @endif</td>
                        <td>@if ($content[8]['answer'] == '1') X @else &nbsp; @endif</td>
                        <td>@if ($content[8]['answer'] == '0') X @else &nbsp; @endif</td>
                    </tr>
                    <tr>
                        <td>10. Tijekom provođenja revizije komunikacija je bila dobra i nalazi i preporuke su jasno priopćeni i dostatno raspravljeni </td>
                        <td>@if ($content[9]['answer'] == '4') X @else &nbsp; @endif</td>
                        <td>@if ($content[9]['answer'] == '3') X @else &nbsp; @endif</td>
                        <td>@if ($content[9]['answer'] == '2') X @else &nbsp; @endif</td>
                        <td>@if ($content[9]['answer'] == '1') X @else &nbsp; @endif</td>
                        <td>@if ($content[9]['answer'] == '0') X @else &nbsp; @endif</td>
                    </tr>
                    <tr>
                        <td>11. Trajanje revizije</td>
                        <td>@if ($content[10]['answer'] == '4') X @else &nbsp; @endif</td>
                        <td>@if ($content[10]['answer'] == '3') X @else &nbsp; @endif</td>
                        <td>@if ($content[10]['answer'] == '2') X @else &nbsp; @endif</td>
                        <td>@if ($content[10]['answer'] == '1') X @else &nbsp; @endif</td>
                        <td>@if ($content[10]['answer'] == '0') X @else &nbsp; @endif</td>
                    </tr>
                    <tr>
                        <td>12. Pravovremenost revizijskog izvješća</td>
                        <td>@if ($content[1]['answer'] == '4') X @else &nbsp; @endif</td>
                        <td>@if ($content[1]['answer'] == '3') X @else &nbsp; @endif</td>
                        <td>@if ($content[1]['answer'] == '2') X @else &nbsp; @endif</td>
                        <td>@if ($content[1]['answer'] == '1') X @else &nbsp; @endif</td>
                        <td>@if ($content[1]['answer'] == '0') X @else &nbsp; @endif</td>
                    </tr>
                    <tr>
                        <td>13. Jasnoća revizijskog izvješća</td>
                        <td>@if ($content[12]['answer'] == '4') X @else &nbsp; @endif</td>
                        <td>@if ($content[12]['answer'] == '3') X @else &nbsp; @endif</td>
                        <td>@if ($content[12]['answer'] == '2') X @else &nbsp; @endif</td>
                        <td>@if ($content[12]['answer'] == '1') X @else &nbsp; @endif</td>
                        <td>@if ($content[12]['answer'] == '0') X @else &nbsp; @endif</td>
                    </tr>
                    <tr>
                        <td>14. Korisnost revizije u poboljšanju poslovnih procesa i kontrola </td>
                        <td>@if ($content[13]['answer'] == '4') X @else &nbsp; @endif</td>
                        <td>@if ($content[13]['answer'] == '3') X @else &nbsp; @endif</td>
                        <td>@if ($content[13]['answer'] == '2') X @else &nbsp; @endif</td>
                        <td>@if ($content[13]['answer'] == '1') X @else &nbsp; @endif</td>
                        <td>@if ($content[13]['answer'] == '0') X @else &nbsp; @endif</td>
                    </tr>
                </tbody>
            </table>
        <span>Kriterij procjene: 4 = vrlo dobro (VD), 3 = dobro (D), 2 = zadovoljavajuće (Z), 1 = loše (L), N/P = nije primjenjivo.</span>
        </div>

</body>

</html>
@if (!$loop->last)
<div style="page-break-after: always;"></div>
@endif
@endforeach
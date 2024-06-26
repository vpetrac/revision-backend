<!DOCTYPE html>
<html>

<head>
    <title>Plan i program revizije</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        @page {
            size: A4 portrait;

            margin: 25px 40px;
            margin-top: 180px;
        }

        .header {
            position: fixed;
            top: -150px;
            height: 140px;
        }

        *,
        h1,
        h2,
        h3,
        h4,
        span,
        p,
        li,
        td {
            font-family: DejaVu Sans !important;
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

        table {}

        tr {}

        td {
            word-wrap: break-word;
            vertical-align: top;
        }

        thead {
            display: table-header-group;
        }

        tfoot {
            display: table-footer-group;
        }

        td img {
            max-width: 100%;
            height: auto;
        }

        img {
            max-width: 100%;
            height: auto;
        }
        p, span, li{
            font-size: 11px !important;
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
                        <td class="tg-cly2" rowspan="4"><strong>OBRAZAC<br>Plan i program revizije</strong></td>
                        <td class="tg-0lax">Klasifikacija</td>
                        <td class="tg-0lax"><span style="font-weight:bold">INTERNO</span></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax" style="max-width: 20px;">Oznaka</td>
                        <td class="tg-0lax"><span style="font-weight:bold">OBR-UNR-06</span></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax">Revizija</td>
                        <td class="tg-0lax"><span style="font-weight:bold">1-06/2022</span></td>
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
        <h1>PLAN I PROGRAM REVIZIJE</h1>
        <div class="tg-wrap">
            <table class="tg" style="width: 100%;">
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
                    <tr>
                        <td>Ustrojstvene jedinice uključene u revidirani proces</td>
                        <td>
                            @php
                            $auditTeamMembers = json_decode($revision->auditTeamMembers, true);
                            $teamMemberNames = array_column($auditTeamMembers, 'label');
                            @endphp
                            {{ implode(', ', $teamMemberNames) }}
                        </td>
                    </tr>
                    <tr>
                        <td>Voditelj revizijskog tima</td>
                        <td>{{$revision->auditTeamHead}}</td>
                    </tr>
                    <tr>
                        <td>Članovi revizijskog tima</td>
                        <td>
                            @php
                            $subjects = json_decode($revision->subjects, true);
                            $subjectNames = array_column($subjects, 'label');
                            @endphp
                            {{ implode(', ', $subjectNames) }}
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="tg" style="width: 100%;">
                <colgroup>
                    <col style="width: 241px">
                    <col style="width: 403px">
                </colgroup>
                <thead>
                    <tr>
                        <th class="upper-header" colspan="2">PROGRAM REVIZIJE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ciljevi revizije</td>
                        <td>{!! $revision->revision_goals_descrption !!}</td>
                    </tr>
                    <tr>
                        <td>Opseg revizije</td>
                        <td>{{$revision->revision_scope}}</td>
                    </tr>
                    <tr>
                        <td>Korisnici revizijskog izvješća</td>
                        <td>{{$revision->report_users}}</td>
                    </tr>
                    <tr>
                        <td>Opis uspostavljenog sustava kotrola / Dijagram toka procesa</td>
                        <td>
                            <div style="max-width: 100%;">{!! $revision->control_system !!}</div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="tg" style="width: 100%;">
                <colgroup>
                    <col style="width: 327px">
                    <col style="width: 200px">
                    <col style="width: 200px">
                </colgroup>
                <thead>
                    <tr>
                        <th class="upper-header" colspan="3">PLANIRANI I OSTVARENI ROKOVI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td>Planirani datum</td>
                        <td>Datum realizacije</td>
                    </tr>
                    <tr>
                        <td>Početak obavljanja pojedinačne unutarnje revizije</td>
                        <td>{{ !empty($revision->planned_start_of_internal_revision) ? \Carbon\Carbon::parse($revision->planned_start_of_internal_revision)->format('d.m.Y') : '' }}</td>
                        <td>{{ !empty($revision->actual_start_of_internal_revision) ? \Carbon\Carbon::parse($revision->actual_start_of_internal_revision)->format('d.m.Y') : '' }}</td>
                    </tr>
                    <tr>
                        <td>Nacrt revizijskog izvješća</td>
                        <td>{{ !empty($revision->planned_draft_of_revision_report) ? \Carbon\Carbon::parse($revision->planned_draft_of_revision_report)->format('d.m.Y') : '' }}</td>
                        <td>{{ !empty($revision->actual_draft_of_revision_report) ? \Carbon\Carbon::parse($revision->actual_draft_of_revision_report)->format('d.m.Y') : '' }}</td>
                    </tr>
                    <tr>
                        <td>Konačno revizijsko izvješće</td>
                        <td>{{ !empty($revision->planned_final_revision_report) ? \Carbon\Carbon::parse($revision->planned_final_revision_report)->format('d.m.Y') : '' }}</td>
                        <td>{{ !empty($revision->actual_final_revision_report) ? \Carbon\Carbon::parse($revision->actual_final_revision_report)->format('d.m.Y') : '' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="page-break"></div>
        <div class="tg-wrap">
            <table class="tg" style="width: 100%;">
                <colgroup>
                    <col style="width: 38px">
                    <col style="width: 382px">
                    <col style="width: 51px">
                    <col style="width: 51px">
                    <col style="width: 51px">
                </colgroup>
                <thead>
                    <tr>
                        <th class="upper-header" colspan="5">INDENTIFIKACIJA I PROCJENA RIZIKA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="2">Rizik i kratak opis rizika</td>
                        <td colspan="3">Procjena inherentne razine rizika</td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td>Učinak<br>(1-5)</td>
                        <td>Vjerojatnost<br>(1-5)</td>
                        <td>Ukupno (Učinak x Vjerojatnost)</td>
                    </tr>
                    @foreach($revision->programs as $program)
                    <tr>
                        <td>{{$loop->index + 1}}.</td>
                        <td>{{$program->risk_description}}</td>
                        <td>{{$program->effect_value}}</td>
                        <td>{{$program->probability_value}}</td>
                        <td>{{$program->probability_value * $program->effect_value}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="tg-wrap">
            <table class="tg" style="width: 100%;">
                <colgroup>
                    <col style="width: 203px">
                    <col style="width: 193px">
                </colgroup>
                <thead>
                    <tr>
                        <th class="upper-header" colspan="2">POVEZANOST CILJEVA I RIZIKA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Cilj</td>
                        <td>Rizik</td>
                    </tr>

                    @foreach ($goalProgram as $goal)
                    {{-- For each goal, check if it has associated programs --}}
                    @if(isset($goal->programs) && !empty($goal->programs))
                    {{-- Loop through each program associated with the goal --}}
                    @foreach ($goal->programs as $program)
                    <tr>
                        <td>{{ $goal->name }}</td> {{-- Display the goal's name --}}
                        <td>{{ $program->risk_description }}</td> {{-- Display the program's name --}}
                    </tr>
                    @endforeach
                    @else
                    {{-- In case there are no associated programs, just show the goal --}}
                    <tr>
                        <td>{{ $goal->name }}</td>
                        <td>N/A</td>
                    </tr>
                    @endif
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="page-break"></div>
        @if($revision->revision_plans)
        <table class="tg" style="width: 100%; margin-bottom: 0;">
            <colgroup>
                <col style="width: 138px">
                <col style="width: 152px">
                <col style="width: 136px">
                <col style="width: 162px">
                <col style="width: 137px">
            </colgroup>
            <thead>
                <tr>
                    <th class="upper-header" colspan="5">PLAN AKTIVNOSTI REVIZIJE</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td colspan="2">Aktivnosti</td>
                    <td>Odgovorna osoba / Revizor</td>
                    <td>Planirani rok<br>provedbe <br>(datum)</td>
                    <td>Ostvareni rok<br>provedbe<br>(datum) </td>
                </tr>
                @foreach (json_decode($revision->revision_plans) as $plan)
                <tr>
                    <td style="text-align: center;" colspan="5">{{ $plan->activity_title }}</td>
                </tr>
                @foreach ($plan->revision_plan_items as $item)
                <tr>
                    <td>{{ $item->code }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->person }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->date_planned)->format('d.m.Y.') }}</td>
                    <td>{{ $item->date_actual ? \Carbon\Carbon::parse($item->date_actual)->format('d.m.Y.') : '' }}</td>
                </tr>
                @endforeach
                @endforeach
            </tbody>
        </table>

        <table class="tg" style="width: 100%;">
            <tbody>
                <tr>
                    <td>Razlozi odstupania od planiranih rokova:</td>
                    <td>{{$revision->deviation_reasons}}</td>
                </tr>
            </tbody>
        </table>
        @endif
        <table class="tg" style="width: 100%;">
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
                    <td>Izradio:</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Odobrio:</td>
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
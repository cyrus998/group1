<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course List</title>
    <style>
        #grades {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #custogradesmers td,
        #grades th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #grades tr:nth-child(odd) {
            background-color: #fbfbfb;
        }

        #grades tr:hover {
            background-color: rgb(221, 225, 238);
        }

        #grades th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #111827;
            color: white;
        }
    </style>
</head>

<body>
    <p style="text-align: center; font-size: 25px; font-weight: bold;">Eden Academy</p>
    <p style="text-align: center; font-size: 20px;">595 Koepenicker Str. 35, Niederwörresbach, Berlint.</p>
    <br>
    <hr style="color: rgb(103, 100, 100)">
    <h4 style="text-align: center; font-weight: bold;">ACADEMIC RECORDS</h4>
    <table id="grades">
        <thead>
            <tr>
                <th style="text-align: center">Student Number</th>
                <th style="text-align: center">Course</th>
                <th style="text-align: center">Prelim </th>
                <th style="text-align: center">Midterm</th>
                <th style="text-align: center">Final</th>
                <th style="text-align: center">Average</th>
                <th style="text-align: center">Point Grade</th>
                <th style="text-align: center">Last Updated</th>
            </tr>
        </thead>
        <tbody>
            @foreach($grades as $grade)
            <tr>
                <td style="text-align: center">{{$grade->studentNumber}}</td>
                <td style="text-align: center">{{$grade->course}}</td>
                <td style="text-align: center">{{$grade->prelim}}</td>
                <td style="text-align: center">{{$grade->midterm}}</td>
                <td style="text-align: center">{{$grade->final}}</td>
                <td style="text-align: center">{{number_format($grade->gwa, 2)}}</td>
                <td style="text-align: center">
                    @if($grade->gwa > 94)
                    <span> (1) </span>
            @elseif($grade->gwa >= 88.5 && $grade-> gwa <= 93.99 ) <strong>1.25</strong></span>
                 @elseif($grade->gwa >= 83 && $grade-> gwa <= 88.49 )<strong> 1.50</strong></span>
                    @elseif($grade->gwa >= 77.5 && $grade-> gwa <= 82.99 ) <strong>1.75</strong><span>
                         @elseif($grade->gwa >= 72 && $grade-> gwa <= 77.49 )<strong> 2.00</strong><span>
                             @elseif($grade->gwa >= 65.5 && $grade-> gwa <= 71.99 ) <strong>2.25</strong><span>
                                @elseif($grade->gwa >= 61 && $grade-> gwa <= 65.49 )<strong> 2.5</strong><span>
                                    @elseif($grade->gwa >= 55.5 && $grade-> gwa <= 60.99 ) <strong>2.75</strong><span>
                                         @elseif($grade->gwa >= 50 && $grade-> gwa <= 55.49 ) <strong>3</strong><span>
                            @endif
                </td>
                <td style="text-align: center">{{$grade->updated_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <section style="margin-top:5rem;">


    </section>
</body>

</html>
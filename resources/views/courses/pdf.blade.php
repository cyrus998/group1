<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course List</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
    <h4 style="text-align: center; font-weight: bold;">COURSE LIST</h4>
    <table id="grades">
        <thead>
            <tr>
                <th style="text-align: center">Course Code</th>
                <th style="text-align: center">Course Title</th>
                <th style="text-align: center">Teacher </th>
                <th style="text-align: center">Created at</th>
                <th style="text-align: center">Last updated</th>
            </tr>
        </thead>
        <tbody>

            @foreach($courses as $course)
            <tr>
                <td style="text-align: center">{{$course->courseCode}}</td>
                <td style="text-align: center">{{$course->courseTitle}}</td>
                <td style="text-align: center">{{$course->teacher}}</td>
                <td style="text-align: center">{{$course->created_at}}</td>
                <td style="text-align: center">{{$course->updated_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <section style="margin-top:5rem;">


    </section>
</body>

</html>
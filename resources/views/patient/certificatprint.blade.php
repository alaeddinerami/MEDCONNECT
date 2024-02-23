<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Certificate</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .container {
            width: 80%;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, p {
            text-align: center;
        }
        .info {
            margin-top: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Medical Certificate</h1>
        <p>This is to certify that</p>
        
        <div class="info">
            <p><strong>Name of doctor:</strong> {{$print->first()->doctor->user->name }}</p>
            <p><strong>Name of patient:</strong> {{Auth::user()->name }}</p>
            <p><strong>date consultation:</strong>  {{$print->first()->date_consultation}}</p>
            <p><strong>days:</strong> {{$print->first()->nomberjr}} day</p>
        </div>
    </div>
</body>
</html>

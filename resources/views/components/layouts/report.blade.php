<!-- resources/views/layout/report-school-card.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Report' }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">    
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            body {
                background-color: #ffffff !important;
            }

            .report-container {
                box-shadow: none;
                margin: 0;
                width: 100%;
            }
        }
    </style>
</head>
<body class="bg-gray-200 p-6">

    <div class="report-container bg-white p-10 mx-auto shadow-lg w-4/5">
        {{ $slot }}
    </div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <style>

    </style>
</head>

<body>
    <div class="container">
        @yield('content')
    </div>
    <div class="container">
        <br><br>
        <p></p>
        <p>Instructor Signature:........................................................Signed......................................................</p>
        <br><br>
        <p>Date:...........................................................</p>
        <br><br>
    </div>
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright my-auto">
                <span>
                    <img src="{{asset('/img/logo/dvla.jpeg')}}" alt="dvla logo" style="width:120px;height:120px; margin-left: 500px" />

                </span>
            </div>
        </div>
    </footer>
</body>

</html>

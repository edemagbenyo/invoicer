<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{asset('css/bootstrap.nofont.css')}}" rel="stylesheet" type="text/css" />

    <style>
        .certificate h4 {
            color: blue;
            font-style: italic;
        }

        .certificate td {
            border: none !important;

        }

        .certificate p {
            border-bottom: 1px dashed #cccccc;
        }

        .certificate {
            padding: 8em 3em 3em 3em;
        }
    </style>
</head>

<body>

    <div id="app">
        <div class="container">
            <div class="row">
                <header style="background:url('{{asset('/intro_img.png')}}'); padding:15px; text-align:center; color:#FFFFFF">
                    <h1>{{config('app.name')}}</h1>
                </header>
            </div>

            <div class="row">
                <h3 style="text-align:center; padding:5em 0; color:#D81B60; font-style: italic;">This is to certify the below work has been carried out</h3>
            </div>
            <div class="row">
                <table class="table certificate">
                    <tr>
                        <td width="50%">
                            <h4>Description of works:</h4>
                        </td>
                        <td>
                            <p>{{$details['description'] ? $details['description'] : '-'}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>At premises:</h4>
                        </td>
                        <td>
                            <p>{{ isset($details['premises']) ? $details['premises']: '-'  }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>On Date:</h4>
                        </td>
                        <td>
                            <p>{{ $details['workdate'] ? $details['workdate'] : '-' }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Expiry date:</h4>
                        </td>
                        <td>
                            <p>{{ $details['expirydate'] ? $details['expirydate'] : '-'}}</p>
                        </td>
                    </tr>
                </table>

            </div>
            <div class="row" style="position:fixed; bottom: 100px;">
                <table>
                    <tr>
                        <td>
                            <h3 style="color:#0cd102">{{config('app.name')}}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Tema port Comm 25 ext.</h5>
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>
                            Tel:02444444444
                        </td>
                        <td>
                            Email: email@saharan.com
                        </td>
                    </tr>
                </table>
            </div>

        </div>
    </div>

</body>

</html>
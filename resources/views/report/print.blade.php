<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{asset('css/bootstrap.nofont.css')}}" rel="stylesheet" type="text/css" />

    <style>
        .intro-content{
            border-top: 2px solid blue;
            border-bottom: 2px solid blue;
        }
        table.intro {
            width: 100%;
            margin: 20px;
        }

        table.intro td {}

        .hd1 td {
            width: 50%;
            padding: 85px 0;
            font-size: 30px;
            text-align: center;
        }

        .hd2 td {
            width: 50%;
            font-size: 1.5em;
        }

        .hd2 td img {
            max-width: 100px;
        }

        .page-break {
            page-break-before: always;
        }

        img.photograph {
            width: 50%;
        }

        .photographs {
            /* display: flex;
            flex-direction: column;
            justify-content: space-around; */
        }

        .photographs h4 {
            text-align: center;
            font-size: 30px;
        }
    </style>
</head>

<body>

    <div id="app">
        <div class="container">

            <div class="row">
                <div class="intro-content">
                    <table class="intro">
                        <tr class="hd1">
                            <td>{{config('app.name')}}</td>
                            <td>
                                {{$details['name']}}
                            </td>
                        </tr>
                        <tr class="hd2">
                            <td rowspan="4">
                                <img src="{{asset('storage/intro_img.png')}}" alt="">
                            </td>
                            <td>
                                Premises: <b>{{$details['premises']}}</b>
                            </td>

                        </tr>
                        <tr class="hd2">
                            <td>
                                Date: <b>{{$details['workdate']}}</b>
                            </td>

                        </tr>
                        <tr class="hd2">
                            <td>
                                Report By: <b>Kevin Butler</b>
                            </td>

                        </tr>
                        <tr class="hd2">
                            <td>
                                Telephone: <b>0503302918</b>
                            </td>

                        </tr>
                    </table>
                </div>
            </div>
            @foreach($photographs as $photo)
            <div class="page-break"></div>
            <div class="row">

                <div class="photographs">
                    <h4>Before Photographs </h4>

                    <img class="photograph" src="{{asset('storage/'.$photo)}}" alt="">

                </div>

            </div>
            @endforeach
            <div class="page-break"></div>
            <div class="row">
                <table class="table table-bordered report">
                    <thead>
                        <tr>
                            <th>Site Report</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Premises Name</td>
                            <td>{{$details['premises']}}</td>
                        </tr>
                        <tr>
                            <td>Premises Address</td>
                            <td>{{$details['address']}}</td>
                        </tr>
                        <tr>
                            <td>Site Contact Name</td>
                            <td>{{$details['contactname']}}</td>
                        </tr>
                        <tr>
                            <td>Observations of
                                kitchen safety issues
                                & recommendations</td>
                            <td>{{$details['observation']}}</td>
                        </tr>
                        <tr>
                            <td>
                                Conclusions and
                                recommendations, do
                                measurements meet
                                acceptable levels of
                                cleanliness as set out
                                in TR19 and BS EN
                                15780:2011
                            </td>
                            <td>
                                <h3>At present System does {{$details['conclusion']?'(NOT)':''}} meet TR19 standards</h3>
                                It is important for all business owners to check all suppliers of these services are registered with the B&ES
                                (Building and Engineering Association) and also hold public Liability Insurance, enabling them to carry out
                                works and Issue valid certification, recognised and acceptable to insurers and fire safety regulators. Business
                                owners should check supplier’s accreditations and ask for copies to ensure suppliers credibility before any
                                works are undertaken. Our company hold all relevant accreditations and insurance cover which are available
                                on request
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="row">

                <table class="table">
                    <tr>
                        <td>Fao</td>
                        <td>{{$details['fao']}}</td>
                        <td>Re</td>
                        <td>{{$details['re']}}</td>
                    </tr>
                    <tr>
                        <td>
                            <p>
                                We thank you for the above enquiry and are now pleased to submit the following
                                quotation for your consideration
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>{{$details['price']}}</td>
                        <td>Schedule of works</td>
                        <td>{{$details['schedule']}}</td>
                    </tr>
                    <tr>
                        <td>Scope of workds</td>
                        <td>{{$details['scope']}}</td>
                    </tr>
                    <tr>
                        <td>Terms</td>
                        <td>{{$details['terms']}}</td>
                        <td>Validity</td>
                        <td>{{$details['validity']}}</td>
                    </tr>
                </table>

            </div>
            <div class="row">
                <table class="table ">
                    <tr>
                        <td>
                            Note to client:

                            It is important for all business owners to check all suppliers of these services are registered with the
                            B&ES (Building and Engineering Association) and also hold public Liability Insurance, enabling
                            them to carry out works and Issue valid certification, recognised and acceptable to insurers and fire
                            safety regulators. Business owners should check supplier’s accreditations and ask for copies to
                            ensure suppliers credibility before any works are undertaken. Our company hold all relevant
                            accreditations and insurance cover which are available on request.
                        </td>
                    </tr>
                </table>
            </div>
        </div>

</body>

</html>
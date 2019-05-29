<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <link href="{{asset('css/bootstrap.nofont.css')}}" rel="stylesheet" type="text/css"/>

    <style>
        .vat-summary{
            padding: 0;
        }
        .vat-summary td, .summary td, .bank td, .items td, .foot td{
            padding:5px !important;
            font-size:12px;
        }
    </style>
</head>
<body>
   
<div id="app">
<div class="container">
        <div class="row">
            <header style="background:#ffb752; padding:15px; text-align:center; color:#FFFFFF">
                {{config('app.name')}}
            </header>
        </div>

        <div class="row">
            <table class="table table-bordered">
                <tr>
                    <td>Invoice Ref: {{$invoice->invoiceref}}</td>
                    <td>{{config('app.name')}}</td>
                    <td>Invoice Date: {{(new Carbon\Carbon($invoice->date))->toFormattedDateString()}}</td>
                </tr>
            </table>
        </div>
        <div class="row">
            <table class="table">
                <tr>
                    <td width="50%">
                        <h4>Our details</h4>
                        <p>{{$settings->details}}</p>
                    </td>
                    <td>
                        <h4>Customer Details</h4>
                        <p>{{ $invoice->client }}</p>
                    </td>
                </tr>
            </table>
            
        </div>
        <div class="row">
            <table class="table table-bordered items">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th>Net</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($invoicedetails->invoiceitems as $item)
                        <tr>
                            <td>{{$item->description}}</td>
                            <td>{{$item->unitprice}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->nettotal}}</td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="row">
            <table class="table">
                
                <tr>
                    <td>
                    </td>
                    <td width="75%">
                        <h4>VAT Summary</h4>
                        <table class="table table-bordered vat-summary">
                            <tr>
                                <td>VAT Rate %</td>
                                <td>Total Net(Ghc)</td>
                                <td>VAT(Ghc)</td>
                            </tr>
                            <tr>
                                <td>{{$settings->vat}}</td>
                                <td>{{$invoicedetails->subtotal}}</td>
                                <td>{{$invoicedetails->vattotal}}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td width="50%">
                        <table class="table table-bordered summary">
                            <tr>
                                <td>Subtotal(Ghc)</td>
                                <td>{{$invoicedetails->subtotal}}</td>
                            </tr>
                            <tr>
                                <td>VAT(Ghc)</td>
                                <td>{{$invoicedetails->vattotal}}</td>
                            </tr>
                            <tr>
                                <td>Total(Ghc)</td>
                                <td>{{$invoicedetails->total}}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <div class="row">
            <table class="table bank">
                <tr>
                    <td>Bank Name</td>
                    <td>{{$settings->bankname}}</td>
                    <td>Account No</td>
                    <td>{{$settings->accountnumber}}</td>
                </tr>
                <tr>
                    <td>Account Name</td>
                    <td>{{$settings->accountname}}</td>
                    <td>Short Code</td>
                    <td>{{$settings->shortcode}}</td>
                </tr>
            </table>
        </div>
        <div class="row">
            <table class="table foot">
                <tr>
                    <td style="text-align:center">
                        <p>Thank You</p>
                        <p>Please pay within 7 days</p>
                        <p>Please make cheques payable to SAHARAN VENTURE LTD</p>
                    </td>
                </tr>
            </table>
        </div>
</div>

</body>
</html>
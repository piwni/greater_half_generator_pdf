<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <script>
        window.axios = require('axios');

        window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

        const token = document.head.querySelector('meta[name="csrf-token"]');

        if (token) {
            window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
        } else {
            console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
        }
    </script>
    <style>
        th {
            border: 1px black;
            border-style: solid none;
            text-align: center;
        }

        body {
            font-family: 'Open Sans', sans-serif;
        }

        td {
            background-color: #DCDCDC;
            text-align: center;

        }

        table {
            border-collapse: collapse;
            margin-top: 30px;
            font-size: 10pt;
            margin-right: 15px !important;
        }

        #top {
            display: flex;
            justify-content: space-between;
        }

    </style>
</head>
<body>
<div id="top">
    @csrf
    <div class="left" style="font-size: 12pt;">
        <p style="font-size: 8pt"> {{$json_data['companyName']}} | {{$json_data['address']['companyAddress']}} | {{$json_data['address']['companyZipCode']}} {{$json_data['address']['companyCity']}}, {{$json_data['address']['companyCountryCode']}}   </p>
        {{$json_data['firstName']}} {{$json_data['lastName']}}<br>
        {{$json_data['address']['customerAddress']}}<br>
        ,<br>
        {{$json_data['address']['customerZipCode']}} {{$json_data['address']['customerCity']}}<br>
        {{$json_data['address']['customerCountry']}}<br>
        ORDER #:  {{$json_data['orderInfo']['orderCode']}}
        <div class="barcodeleft" style="margin-top: 10px;transform: scale(0.55) !important; margin-right: 700px">
            @php

               $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                   echo $generator->getBarcode($json_data['orderInfo']['orderCodeBarcode'], $generator::TYPE_CODE_128);
            @endphp
        </div>
    </div>
    <div class="right" style="border: 3px solid black;float: right; height: 210px; width: 300px; text-align: center"><p>
            Delivery note  <br>
            {{$json_data['orderInfo']['deliveryDate']}}<br>
            For inquiries: <br>
            {{$json_data['orderInfo']['deliveryForInquires']}}</p>
        <div class="barcodeOrder" style="margin-left: 35px; ">
            @php

                    $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                        echo $generator->getBarcode($json_data['orderInfo']['orderNumberBarcode'], $generator::TYPE_CODE_128);
            @endphp
        </div>
        Order: {{$json_data['orderInfo']['orderNumber']}}
        <div class="barcode" style="margin-left: 35px;">
            @php
                   $generator = new Picqer\Barcode\BarcodeGeneratorHTML();

                       echo  $generator->getBarcode($json_data['orderInfo']['deliveryCodeBarcode'],$generator::TYPE_CODE_128);
            @endphp
        </div>
        Delivery: {{$json_data['orderInfo']['deliveryCode']}}
        <div style="font-size: 8pt; float: right; margin-right: 5px;">{{$json_data['orderInfo']['deliveryNoteID']}}</div>
    </div>
</div>
<div class="table">
    <table>
        <tr>
            <th>Pos.</th>
            <th>Item</th>
            <th>Article</th>
            <th>Article description</th>
            <th>SKU</th>
        </tr>
        @foreach($json_data['articleList'] as $val)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$val['itemQuantity']}}</td>
            <td><p>{{$val['articleID']}}<br><br>
                    Finishes:<br>
                    {{$val['articleFinishes']}}</p>
            </td>
            <td><p>{{$val['articleDescription']}}<br>
                Size: {{$val['articleSize']}} <br>Color: {{$val['articleColor']}}</p>
            </td>

            <td style="text-align: left;">

                <p style="margin-left: 150px !important;"> {{$val['articleSKU']}} </p>
                <div id="barcodeSKU" style="transform-origin:top;transform: scale(0.6);margin-left: 60px">
                @php

                                        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
             echo $generator->getBarcode( $val['articleSKUBarcode'], $generator::TYPE_CODE_128);
                @endphp
                </div>
            </td>
        </tr>
        @endforeach

    </table>
</div>
</body>
</html>

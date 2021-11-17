<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ideal Snake Traveler 10.14.21</title>
    <style>
        th {
            border: 1px black;
            border-style: solid none;
            text-align: left;
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
        }

        #top {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
<div id="top">
    <div class="left" style="font-size: 12pt;">
        <p style="font-size: 8pt"> Greater half | 129 Dishman Ln | 42104 Bowling Green, US</p>
        Allen Bullman<br>
        726 CUMBERLAND TRACE RD APT 917<br>
        ,<br>
        42103-9141 BOWLING GREEN<br>
        United States of America<br>
        ORDER #: 647100-#GH123472
        <div class="barcodeleft" style="margin-top: 10px;">
            @php
                $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                    echo $generator->getBarcode('#GH123472', $generator::TYPE_CODE_128);
            @endphp
        </div>
    </div>
    <div class="right" style="border: 3px solid black;float: right; height: 190px; width: 300px; text-align: center"><p>
            Delivery note 10/12/2021 <br>
            For inquiries: <br>
            1-345370-5-8719-647100-#GH123472</p>
        <div class="barcode" style="margin-left: 35px;">
            @php
                $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                    echo $generator->getBarcode('#1145303', $generator::TYPE_CODE_128);
            @endphp
        </div>
        Order: #1145303
        <div class="barcode" style="margin-left: 35px;">
            @php
                $generator = new Picqer\Barcode\BarcodeGeneratorHTML();

                    echo  $generator->getBarcode('#1146321',$generator::TYPE_CODE_128);
            @endphp
        </div>
        Delivery: #1146321
        <div style="font-size: 8pt; float: right; margin-right: 5px;">10560</div>
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
        <tr>
            <td>1</td>
            <td>1</td>
            <td><p>DO4KEV<br><br>
                    Finishes:<br>
                    Digital printing</p>
            </td>
            <td><p>BELLA+CANVAS UNISEX MADE IN THE USA JERSEY T-SHIRT<br>
                Size: 3XL, Color:</p>
            </td>

            <td>
                X-BC3001U-NV-3XL-VADERLUCK
                @php
                    $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
         echo $generator->getBarcode('X-BC3001U-NV', $generator::TYPE_CODE_128);
                @endphp
            </td>
        </tr>
    </table>
</div>
</body>
</html>

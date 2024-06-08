<?php
require '../../vendor/autoload.php';

use Dompdf\Dompdf;

// Instantiate and use the dompdf class
$dompdf = new Dompdf();

// HTML content for the receipt
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .center {
            text-align: center;
        }
        .large {
            font-size: 36px;
            font-weight: bold;
        }
        .small {
            font-size: 10px;
        }
        .bold {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="center large">666</div>
    <div class="center">
        For all Feedback & Comments:<br>
        Complaints@mcdonaldsraleigh.com<br>
        or call/text 919-457-2827<br>
        BUY ONE GET ONE MEDIUM FRAPPE<br>
        Go to www.mcdvoice.com within 7 days<br>
        and tell us about your visit.<br>
        <span class="bold">Validation Code:</span><br>
        Expires 30 days after receipt date.<br>
        Valid at participating US McDonald\'s.<br>
        <span class="bold">Survey Code:</span><br>
        13334-06661-21619-18579-00010-8
    </div>
    <hr>
    <div class="center">
        <span class="bold">McDonald\'s Restaurant #13334</span><br>
        6333 FALLS OF NEUSE<br>
        RALEIGH, NC 27609<br>
        TEL# 919-878-0085
    </div>
    <hr>
    <div class="center small">12/16/2019 06:57 PM<br>Order 66</div>
    <div>
        <table width="100%">
            <tr>
                <td>1 Cheeseburger</td>
                <td align="right">1.00</td>
            </tr>
            <tr>
                <td>Subtotal</td>
                <td align="right">1.00</td>
            </tr>
            <tr>
                <td>Tax</td>
                <td align="right">0.08</td>
            </tr>
            <tr>
                <td class="bold">Take-Out Total</td>
                <td align="right" class="bold">1.08</td>
            </tr>
        </table>
    </div>
    <hr>
    <div>
        <table width="100%">
            <tr>
                <td>Cashless</td>
                <td align="right">1.08</td>
            </tr>
            <tr>
                <td>Change</td>
                <td align="right">0.00</td>
            </tr>
        </table>
    </div>
    <div class="center bold">PAID</div>
</body>
</html>
';

// Load HTML content into dompdf
$dompdf->loadHtml($html);

// Set paper size to A4
$dompdf->setPaper('A5', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF (1 = download and 0 = preview)
$dompdf->stream("SalesReport", array("Attachment" => 0));

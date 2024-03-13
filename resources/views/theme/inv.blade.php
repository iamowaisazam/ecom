<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>

        .invoice_items td{
            text-align: center;
            border-bottom: 1px solid;
            border-right: 1px solid;
            border-left: 1px solid;
            margin: 0px
        }
    </style>
</head>
<body>
    <table style="width: 100%" border="0" >
        <tbody>
            <tr>
                <td style="width: 300px">
                    <p>Owais Azam</p>
                    <p>03112239342</p>
                    <p>iamowaisazam@gmail.com</p>
                </td>
                <td colspan="2" ></td>
                <td >Order No:1</td>
            </tr>
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
            @foreach (range(1,6) as $item)
                <tr class="invoice_items">
                    <td>Product {{$item}}</td>
                    <td>{{number_format(200,2)}}</td>
                    <td>{{number_format(8,2)}}</td>
                    <td>{{number_format(500,2)}}</td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <th style="text-align: center" >Grand Total</th>
                <td style="text-align: center" >{{number_format(300,2)}}</td>
            </tr>
            <tr>
                <td colspan="4" > 
                    <p>Notes:</p>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae ad placeat, sed sequi quis aspernatur sit dicta harum architecto perferendis. Dolor veniam voluptatum nulla cupiditate exercitationem odio rerum beatae quis.</p>
                </td>
            </tr>
        </tbody>
    </table>
  </body>
</html>
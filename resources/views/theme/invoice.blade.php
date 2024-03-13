<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>

        h6{
            font-size: 20px;
        }

        .text-center{
            text-align: center;
        }

        table thead td,  table thead th {
            border:none;
        }

        table {
            width: 100%;
            caption-side: bottom;
            border-collapse: collapse;
        }

        table td,table th {
            padding: 10px;
        }
    </style>
</head>
<body>
    <table style="width: 100%" border="1"  >
        <thead>
            <tr>
                <td >
                    <h6>Invoice To:</h6>
                    <p>{{$data->customer_name}}</p>
                    <p>{{$data->customer_phone}}</p>
                    <p>{{$data->customer_email}}</p>
                    <p>{{$data->country}},{{$data->city}}</p>
                    <p>{{$data->address}}</p>
                </td>
                <td  colspan="2" ></td>
                <td style="text-align: right" >
                    <h6>Invoice To:</h6>
                    <p>Owais Azam</p>
                    <p>03112239342</p>
                    <p>iamowaisazam@gmail.com</p>
                </td>
            </tr>
        </thead>
        <tbody>
           
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
            @foreach ($data->children as $item)
                <tr class="invoice_items">
                    <td>{{$item->title}} - ({{$item->sku}})</td>
                    <td class="text-center" >{{number_format($item->price,2)}}</td>
                    <td class="text-center" >{{number_format($item->quantity,2)}}</td>
                    <td class="text-center" >{{number_format($item->total,2)}}</td>
                </tr>
            @endforeach
            <tr>
                <td style="border-right: none;" ></td>
                <td style="border: none;" ></td>
                <th class="text-center" >Grand Total</th>
                <td class="text-center" >{{number_format($data->grandtotal,2)}}</td>
            </tr>
            <tr>
                <td colspan="4" > 
                    <h6>Notes:</h6>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae ad placeat, sed sequi quis aspernatur sit dicta harum architecto perferendis. Dolor veniam voluptatum nulla cupiditate exercitationem odio rerum beatae quis.</p>
                </td>
            </tr>
        </tbody>
    </table>
  </body>
</html>
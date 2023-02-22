<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Confirmation</title>
</head>
<body>
    <p>Hi {{Auth::user()->name}}</p>
    {{-- <img src = "{{asset('upload/product/small/tree10.jpg')}}"> --}}

    <p>Your order has been successfully placed</p>
    <br/>

    <table>
        <thead>
            <tr>
                <th>Name product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            $quantity = 0;
            foreach (session('cart') as $key => $value){
            $tong = $value['price'] * $value['qty'];
                        $total = $total + $tong;
                        
                        // echo $value['qty'];
                        // echo '</br>';
                        // var_dump($_SESSION['cart']['qty']);
                        $quantity = $quantity + $value['qty'];
                        
                        $getArrImage = json_decode($value['image'], true);
            ?>
            <tr>
                <td><?php echo $value['name']?></td>
                <td><?php echo $value['price']?></td>
                <td><?php echo $value['qty'] ?></td>
                <td><?php echo $tong ?></td>
            </tr>
            <?php }?>

            <tr>
                <td colspan="3" style = 'border-top: 1px solid #ccc;'></td>
                <td style="font-size:15px ; font-weight:bold; border-top:1px solid #ccc;">Cart Sub Total:  </td>
            </tr>

            <tr>
                <td colspan="3"></td>
                <td style="font-size:15px ; font-weight:bold; border-top:1px solid #ccc;">Eco Taxc:  0$</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="font-size:15px ; font-weight:bold; border-top:1px solid #ccc;">Shipping Cost:  Free  </td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="font-size:15px ; font-weight:bold; border-top:1px solid #ccc;">Total:  <?php echo $total ?>  </td>
            </tr>
        </tbody>

    </table>
</body>
</html>
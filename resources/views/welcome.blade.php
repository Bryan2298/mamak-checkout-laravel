<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mamak</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            h1 {
                text-align: center;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <h1 class="m-5">Mamak Checkout</h1>
        <div class="container mt-5">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action={{route("checkout")}}>
                @csrf {{-- avoid (CSRF) attacks--}}
                <div class="row">
                    <div class="col-12">
                    <select class="form-control" name="product_code" style="font-weight: bold; width: 40%; margin: auto;">
                        @foreach($products as $product)
                            <option style="font-weight: bold" value={{$product->code}}>{{$product->code}}: {{$product->name}} | (RM{{number_format((float)$product->price, 2, '.', '')}})</option>
                        @endforeach
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4 mb-4" style="width: 40%; margin: auto;">Scan</button>
                </div>
            </form>

            <div class="container" style="font-weight: bold; width: 40%; margin: auto;">
                List: 
                @foreach($checkout_list as $checkout_item)
                    @if ($loop->last)
                        {{$checkout_item->product_code}}
                    @else
                        {{$checkout_item->product_code}},
                    @endif
                @endforeach
                <br>
                Total price expected: RM{{number_format((float)$total_price, 2, '.', '')}}
                <br>
                <a type="submit" href={{route("checkout.clear")}} class="btn btn-primary mt-4" style="width: 40%;">Clear Items</a>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </body>
</html>

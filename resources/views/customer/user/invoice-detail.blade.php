<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--begin::Head-->

<head>
    <base href="">
    <title>{{$order->ordercode}}</title>
    <style>
        body {
            font-family: 'arial', sans-serif;
        }

        .align-right {
            text-align: right;
        }

        .align-center {
            text-align: center;
        }

        td {
            font-size: 14px;
        }

        .wrap {
            word-wrap: break-word;
            word-break: normal;
        }
    </style>

<body>


    <!-- START MAIN CONTENT -->
    <div class="main_content">


        <!-- START SECTION SHOP -->
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-8">
                        <div class="tab-content dashboard_content">

                            <div class="tab-pane fade active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                <div class="card">
                                    <div class="d-flex justify-content-between items-center px-3 pt-2">
                                        <div class="mb-5">
                                            <div align="center">
                                                <img style="width: 200px!important;" class="logo_light" src="upload/logos/markketlogo.png" alt="logo" />
                                            </div>
                                            <h3>{{$order->ordercode}}</h3>
                                            <p>{{$order->status}} - {{\Carbon\Carbon::parse($order->created_at)->format('d M Y')}}</p>
                                        </div>
                                        <div class="">

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table" cellpadding="3" cellspacing="0" border="1" width="100%">
                                            <thead>
                                                <tr>
                                                    <th width="25%">SKU</th>
                                                    <th width="35%">Product</th>
                                                    <th width="15%" class="align-right">Unit Price(£)</th>
                                                    <th width="15%" class="align-center">Qty</th>
                                                    <th width="10%" class="align-right">Total(£)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($order->orderproducts as $product)
                                                <tr>
                                                    <td>{{ $product->product->sku}}</td>
                                                    <td>{{ $product->product->name}}</td>
                                                    <td class="align-right">{{ $product->sold_price}}</td>
                                                    <td class="align-center">{{ $product->quantity}}</td>
                                                    <td align="right">{{ $product->sold_price * $product->quantity }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="4">SubTotal</th>
                                                    <td class="product-subtotal" align="right">{{$order->cart_price}}</td>
                                                </tr>
                                                <tr>
                                                    <th colspan="4">VatTotal</th>
                                                    <td class="product-subtotal" align="right">{{$order->vat_price}}</td>
                                                </tr>

                                                <tr>
                                                    <th colspan="4">Shipping</th>
                                                    <td class="product-subtotal" align="right">{{$order->shipment_price}}</td>
                                                </tr>
                                                <tr>
                                                    <th colspan="4">Discount</th>
                                                    <td class="product-subtotal" align="right">-{{$order->discount_price}}</td>
                                                </tr>
                                                <tr>
                                                    <th colspan="4">Total</th>
                                                    <td class="product-subtotal" align="right">{{$order->total_price}}</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <div class="col-md-12 mt-4">
                                            <h3>Shipping Information </h3>
                                            <hr>

                                            <p>Name Surname : {{$order->ordershipping->name}} {{$order->ordershipping->surname}}</p>
                                            <p>Email : {{$order->ordershipping->email}} </p>
                                            <p>Mobile & Phone : {{$order->ordershipping->mobile}} {{$order->ordershipping->phone}}</p>
                                            <p>Address : {{$order->ordershipping->address->formatted_address}} </p>
                                        </div>
                                        <div class="col-md-12 mt-5">
                                            <h3>Billing Information </h6>
                                                <hr>

                                                <p>Company Name : {{$order->orderbilling->company_name}} </p>
                                                <p>Vat & Registeration : {{$order->orderbilling->vat}} {{$order->orderbilling->registeration}}</p>
                                                <p>Address : {{$order->orderbilling->address->formatted_address}} </p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION SHOP -->

    </div>
    <!-- END MAIN CONTENT -->
</body>
</head>

</html>
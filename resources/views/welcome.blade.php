@extends('shopify-app::layouts.default')

@section('styles')
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
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
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
@endsection

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">

                {{ ShopifyApp::shop()->shopify_domain }}
            </div>



            <div class="links">
                <a href="{{route('addform')}}">Add Product</a>
                <a href="{{route('showproducts')}}">Store</a>
                <a href="{{route('createhook')}}">create Hook</a>
                

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent

    <script type="text/javascript">
        window.mainPageTitle = 'Main Page';
        ShopifyApp.ready(function(){
            ShopifyApp.Bar.initialize({
                title: 'Welcome',
                buttons: {
                    secondary: {
                        label: 'Documentation',
                        href: 'https://github.com/ohmybrew/laravel-shopify',
                        target: 'new'
                    }
                }
            });
        });
    </script>

@endsection
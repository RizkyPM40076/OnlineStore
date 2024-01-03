<!DOCTYPE html>
<html>
   <head>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>OutfitStore</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- Tailwind CSS -->
      <link rel="stylesheet" href="path/to/tailwind.css">
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      <style type="text/css">
        .center
        {
            margin: auto;
            width: 50%;
            text-align: center;
            padding: 30px;
        }

        table,th,td
        {
            border: 1px solid grey;

        }

        .th_deg
        {
            font-size: 30px;
            padding: 5px;
            background: gray;
        }

        .img_deg
        {
         height: 100px;
         width: 200px;
        }

        .total_deg
        {
         font-size: 20px;
         padding: 40px;
        }

      </style>


   </head>
   <body>

      @include('sweetalert::alert')
      <div class="hero_area">
         <!-- header section strats -->
         @Include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         
         <!-- end slider section -->

      <!-- why section -->

      @if(session()->has('message'))

          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            {{ session()->get('message') }}

          </div>

      @endif
      
      <div class="center">
        <table>
            <tr>
                <th class="th_deg">Product Title</th>
                <th class="th_deg">Product quantity</th>
                <th class="th_deg">Price</th>
                <th class="th_deg">Image</th>
                <th class="th_deg">Action</th>

            </tr>


              <?php $totalprice=0; ?>
           
              @foreach($cart as $cart)  
              
                <tr>
                    <td>{{$cart->product_title}}</td>
                    <td>{{$cart->quantity}}</td>
                    <td>{{$cart->price}}</td>
                    <td><img class="img_deg" src="/product/{{$cart->image}}"></td>
                    <td>
                     <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="confirmation(event)" href="{{url('remove_cart',$cart->id)}}">Remove</a>
                    </td>
                </tr>

              <?php $totalprice=$totalprice + $cart->price?>

              @endforeach
            

        </table>

        <div>
         <h1 class="total_deg">Total Price: {{ $totalprice }}</h1>
        </div>

        <div class="text-center">
            <h1 class="text-2xl font-bold pb-4">Proceed To Order</h1>
            <a href="{{url('cash_order')}}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mr-2">Cash On Delivery</a>
            <a href="{{url('stripe',$totalprice)}}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Bayar Dengan Debit/Kredit</a>
         </div>


      </div>

      <!-- footer start -->
     
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2023 All Rights Reserved By <a href="">Ztechnology</a><br>
         
            Distributed By <a href="" target="_blank">Ztechnology</a>
         
         </p>
      </div>

      <script>
            function confirmation(ev) {
              ev.preventDefault();
              var urlToRedirect = ev.currentTarget.getAttribute('href');  
              console.log(urlToRedirect); 
              swal({
                  title: "Apakah Anda Yakin Ingin menghapus?",
                  text: "Produk Akan Dihapus dari Keranjang",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              })
              .then((willCancel) => {
                  if (willCancel) {


                      
                    window.location.href = urlToRedirect;
                    
                  }  

                  


              });

              
            }
      </script>

      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
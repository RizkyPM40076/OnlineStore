<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <style type="text/css">
        .title_deg
        {
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            padding-bottom: 40px;
        }

        .table_deg
        {
            border: 2px solid white;
            width: 90%;
            margin: auto;
            text-align: center;
        }

        .th_deg
        {
            background-color: #38425e;
        }

        .img_size
        {
            width: 200px;
            height: 100px;
        }

        .name_column {
            max-width: 80px; /* Sesuaikan lebar maksimal sesuai kebutuhan */
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->

        <div class="main-panel">
          <div class="content-wrapper">

            <h1 class="title_deg">All Orders</h1>

            <div style="padding-left: 400px; padding-bottom: 30px">
              <form action="{{url('search')}}" method="get">

                @csrf

                <input type="text" style="color: black;" name="search" placeholder="Search For Something">

                <input type="submit" value="Search" class="btn btn-outline-primary">
              </form>
            </div>

            <table class="table_deg">
                <tr class="th_deg">
                    <th class="name_column" style="padding: 3px">Name</th>
                    <th class="name_column" style="padding: 3px">Email</th>
                    <th class="name_column" style="padding: 3px">Address</th>
                    <th style="padding: 3px">phone</th>
                    <th style="padding: 3px">Product_title</th>
                    <th style="padding: 3px">Quantity</th>
                    <th style="padding: 3px">Price</th>
                    <th style="padding: 3px">Payment Status</th>
                    <th style="padding: 3px">Delivery Status</th>
                    <th style="padding: 3px">Image</th>
                    <th style="padding: 3px">Delivered</th>
                    <th style="padding: 3px">Print PDF</th>
                    <th style="padding: 3px"> Send Email</th>
                </tr>

                @forelse($order as $order)

                <tr>
                    <td class="name_column">{{ $order->name }}</td>
                    <td class="name_column">{{ $order->email }}</td>
                    <td class="name_column">{{ $order->address }}</td>
                    <td class="name_column">{{ $order->phone }}</td>
                    <td class="name_column">{{ $order->product_title }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->price }}</td>
                    <td>{{ $order->payment_status }}</td>
                    <td>{{ $order->delivery_status }}</td>
                    <td>
                        <img class="img_size" src="/product/{{$order->image}}">
                    </td>

                    <td>
                        @if($order->delivery_status=='processing')
                        <a href="{{url('delivered',$order->id)}}" onclick="return confirm('Are You Sure?')" class="btn btn-primary">Delivered</a>

                        @else

                        <p style="color:green">Delivered</p>

                        @endif
                    </td>

                    <td>
                      <a href="{{url('print_pdf',$order->id)}}" class="btn btn-secondary">Print PDF</a>
                    </td>

                    <td>

                    <a href="{{url('send_email',$order->id)}}" class="btn btn-info">Send Email</a>

                    </td>

                </tr>

                @empty

                <tr>
                  <td colspan="16">
                    No Data Found
                  </td>
                </tr>

                @endforele
            </table>

          </div>

        </div>
       
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
  </body>
</html>
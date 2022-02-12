@extends('layout.app')

@section('content')

    <?php use Illuminate\Support\Facades\DB; ?>
    <h1 style="color:#800080;font-weight: bold">Orders: <span style="color: red">Pending</span></h1>


    <div class="col-lg-12">
        <a href="{{url('/orderController')}}"> <button type="button" class="btn btn-primary col-lg-3" >Accepted</button></a>
        <a href="{{url('/orderController',1)}}"> <button type="button" class="btn btn-danger col-lg-3" >Pending</button></a>
        <a href="{{url('/orderController',2)}}"> <button type="button" class="btn btn-success col-lg-3" >Delivered</button></a>
    </div>
    <?php
    $customers = DB::table('customers')
        ->join('orders','orders.id','=','customers.id')
        ->join('order_details','order_details.id','=','orders.id')
        ->join('order_detail_order_status as od','od.order_detail_id','=','order_details.id')
        ->join('order_statuses','od.order_status_id','=','order_statuses.id')
        ->where('order_statuses.status','=','pending')
        ->get(['customers.*','order_statuses.id as OsId']);
    ?>
    @foreach($customers as $customer)
        <br><br>
        <div class="card">
            <div class="card-header">
                <h2 style="color:black;"> {{$customer->firstName." ".$customer->lastName}}</h2>
                <div class="dropdown show" style="float:right;padding-right: 3em">
                    <a class="btn btn-danger dropdown-toggle btn-success fa fa-angle-down" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        pending
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{url('/updateStatus/'.$customer->OsId.'/accepted')}}">Accepted</a>
                        <a class="dropdown-item" href="{{url('/updateStatus/'.$customer->OsId.'/delivered')}}">Delivered</a>
                    </div>
                </div>
            </div>
            <div class="card-body" style="color: black">
                <p class="card-text"> address:{{$customer->address}}</p>
                <p class="card-text"> email:{{$customer->email}}</p>
                <p class="card-text"> Phone:{{$customer->phoneNumber}}</p>
            </div>
        </div>
    @endforeach
    <!-- End of Content Wrapper -->
    {{--   <?php  $alerts = \App\Models\Alert::https://www.google.com/all();
       foreach ($alerts as $alert){

       ?>
       <br><br><br>

       <div class="row">

           <div class="col-lg-12">

               <!-- Default Card Example -->
               <div class="card mb-4">
                   <div class="card-header">
                       <h1 style="color: black"><?php echo $alert->heading ?></h1>
                       <span style="float: right;padding-right: 3em;color: black" >{{$alert->date_at_posted}}</span>
                   </div>
                   <div class="card-body">
                       <?php echo  $alert->description ?>
                   </div>
                   <div>
                       <form style="padding-right: 3em" action="{{route('altsControl.edit',$alert->id)}}" method="get">
                           {{csrf_field()}}
                           <input type="submit" name="editPage" value="edit"  class="btn btn-dark" style="float:right;">
                       </form>
                       <form class="btnAlerts" action="{{route('altsControl.destroy',$alert->id)}}" method="Post">
                           {{csrf_field()}}

                           <input type="hidden" name="_method" value="DELETE">
                           <input type="submit" value="delete" class="btn btn-danger" >
                       </form>
                   </div>
               </div>

           </div>

       </div>
       <?php }?>
   --}}
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

    </body>

    </html>
@endsection

@extends('layout.app')

@section('content')

    <h1 style="color:#800080;font-weight: bold" >Cultivation guidelines</h1>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->

        <div style="float:right;">  <a href="{{url('/addCG')}}" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-plus">+</span> Add
            </a>
        </div>


    </div>

    <br><br><br>

    <?php  $cultivationGuidelines = \App\Models\cultivationGuideline::all();
    foreach ($cultivationGuidelines as $cultivationGuideline){

    ?>
    <div class="row">

        <div class="col-lg-12">

            <!-- Default Card Example -->
            <div class="card mb-4">
                <div class="card-header">
                    <h1 style="color: black"><?php echo $cultivationGuideline->heading ?></h1>
                </div>
                <div class="card-body">
                    <?php echo  $cultivationGuideline->description ?>
                </div>
                <div>
                    <form style="padding-right: 3em" action="{{route('CGController.update',$cultivationGuideline->id)}}" method="Post">
                        @method('PUT')
                        {{csrf_field()}}
                        <input type="submit" name="editCG" value="edit"  class="btn btn-dark" style="float:right;">
                    </form>
                    <form class="btnAlerts" action="{{route('CGController.destroy',$cultivationGuideline->id)}}" method="Post">
                        {{csrf_field()}}

                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" value="delete" class="btn btn-danger" >
                    </form>
                </div>
            </div>

        </div>

    </div>
    <?php }?>


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


@endsection('content')

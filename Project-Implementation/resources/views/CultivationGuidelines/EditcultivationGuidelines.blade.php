@extends('layout.app')

@section('content')


    <?php $CG = \App\Models\cultivationGuideline::findOrFail($id)?>


    <form action="{{route('CGController.update',$id)}}" method="Post"  enctype="multipart/form-data">
        @method('PUT')
        {{csrf_field()}}
        <div class="form-row" >
            <div class="form-group col-md-5">
                <label for="inputEmail4">Heading</label>
                <input type="text" class="form-control" name="heading"  value="{{$CG->heading}}" id="inputEmail4" placeholder="Heading">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Description</label>
            <textarea class="form-control" name="description" rows="6" cols="50" id="inputAddress">{{$CG->description}}</textarea>
        </div>
        <input type="submit" name="edited" class="btn btn-primary" value="edit">
    </form>



    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2019</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
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
@endsection('content')


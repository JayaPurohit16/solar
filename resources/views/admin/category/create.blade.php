@extends('admin.layouts.main')
@section('main')
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Category Create</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i
                            class="anticon anticon-home m-r-5"></i>Home</a>
                    <a href="{{ route('admin.category.index') }}" class="breadcrumb-item"><i
                            class="anticon anticon-build"></i> Category</a>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form id="categoryForm" action="{{ route('admin.category.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title"
                                maxlength="50">
                            <span id="title-msg" class="text-danger"></span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {

            $("#categoryForm").validate({
                ignore: [],
                rules: {
                    title: {
                        required: true,
                        maxlength: 50
                    }
                },
                messages: {
                    title: {
                        required: "Please enter a title",
                        maxlength: "Maximum 50 characters allowed"
                    }
                },
            });

            $('#title').keyup(function() {
                var max = 50;
                var len = $(this).val().length;
                if (len >= max) {
                    $('#title-msg').text('Your characters limit is over');
                } else {
                    $('#title-msg').text('');
                }
            });

        });
    </script>
@endsection

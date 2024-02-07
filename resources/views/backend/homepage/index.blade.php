@extends('backend.layouts.backend')

@section('page_title', 'Change Password')

@section('breadcrumb_link_one',Str::ucfirst(Request::segment(2)))
@section('breadcrumb_link_two',Str::ucfirst(Request::segment(3)))

@section('breadcrumb_sub_link')
        <a class="dropdown-item" href="#">#</a>
        <a class="dropdown-item" href="#">#</a>
        <a class="dropdown-item" href="#">#</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">#</a>
@endsection

@section('page_style')


@endsection

@section('page-content')



@if(Route::current()->getName() == 'admin.feature')
<div class="card">
    <div class=" card-header">
        <div class="col text-start">
            {{ __('Feature section') }}
        </div>
    </div>
    <div class="card-body">
        <form id="myForm" method="post" action="{{ route('admin.category.store') }}">
            @csrf

          <div class="row g-3">
            <div class="col-7">
                <div class="separator">Feature #01</div>

                <div class="row">
                    <div class="col">
                        <div class="from-group mb-3">
                            <label class="form-label" for="feature_icone_01">Feature Icone </label>
                            <input type="file" name="feature_icone_01" id="feature_icone_01" class="form-control" >
                    </div>
                    </div>
                    <div class="col">
                        <div class="profile-avatar text-center " >
                            <img id="showFeatureIcone01"src="{{(!empty($profile->photo)) ? url('upload/admin_images/'.$profile->photo): url('frontend/images/single-feature_01.svg') }}" class="shadow " width="120" height="120" alt="" style="background-color: #16327a;">
                        </div>
                    </div>
                </div>


                <div class="from-group mb-3">
                    <label class="form-label" for="feature_title_01">Feature Title </label>
                    <input name="feature_title_01" id="feature_title_01" type="text" class="form-control">
                    <p class="mt-1" id="feature_title_noticeArea_01"></p>
                </div>

                <div class="from-group mb-3">
                    <label class="form-label" for="feature_summary_01">Feature Summary </label>
                    <input name="feature_summary_01" id="feature_summary_01" type="text" class="form-control">
                    <p class="mt-1" id="feature_summary_noticeArea_01"></p>
                </div>

                <div class="separator">Feature #02</div>

                <div class="row">
                    <div class="col">
                        <div class="from-group mb-3">
                            <label class="form-label" for="feature_icone_02">Feature Icone </label>
                            <input type="file" name="feature_icone_02" id="feature_icone_02" class="form-control" >
                    </div>
                    </div>
                    <div class="col">
                        <div class="profile-avatar text-center " >
                            <img id="showFeatureIcone02"src="{{(!empty($profile->photo)) ? url('upload/admin_images/'.$profile->photo): url('frontend/images/single-feature_02.svg') }}" class="shadow " width="120" height="120" alt="" style="background-color: #16327a;">
                        </div>
                    </div>
                </div>

                <div class="from-group mb-3">
                    <label class="form-label" for="feature_title_02">Feature Title</label>
                    <input name="feature_title_02" id="feature_title_02" type="text" class="form-control">
                    <p class="mt-1" id="feature_title_noticeArea_02"></p>
                </div>

                <div class="from-group mb-3">
                    <label class="form-label" for="feature_summary_02">Feature Summary </label>
                    <input name="feature_summary_02" id="feature_summary_02" type="text" class="form-control">
                    <p class="mt-1" id="feature_summary_noticeArea_02"></p>
                </div>

                <div class="separator">Feature #03</div>
                <div class="row">
                    <div class="col">
                        <div class="from-group mb-3">
                            <label class="form-label" for="feature_icone_03">Feature Icone </label>
                            <input type="file" name="feature_icone_03" id="feature_icone_03" class="form-control" >
                    </div>
                    </div>
                    <div class="col">
                        <div class="profile-avatar text-center " >
                            <img id="showFeatureIcone03"src="{{(!empty($profile->photo)) ? url('upload/admin_images/'.$profile->photo): url('frontend/images/single-feature_03.svg') }}" class="shadow " width="120" height="120" alt="" style="background-color: #16327a;">
                        </div>
                    </div>
                </div>
                <div class="from-group mb-3">
                    <label class="form-label" for="feature_title_03">Feature Title</label>
                    <input name="feature_title_03" id="feature_title_03" type="text" class="form-control">
                    <p class="mt-1" id="feature_title_noticeArea_03"></p>
                </div>

                <div class="from-group mb-3">
                    <label class="form-label" for="feature_summary_03">Feature Summary </label>
                    <input name="feature_summary_03" id="feature_summary_03" type="text" class="form-control">
                    <p class="mt-1" id="feature_summary_noticeArea_03"></p>
                </div>
            </div>

            <div class="col-5">


                    <div class="card border shadow-none mb-3" style="height:450px; width: ">
                        <div class=" card-header radius-10 border-0 border-start border-pink border-3">
                                <div class="">
                                  <h6 class="mb-0 text-pink">Image size will be height 605px width 790px. Background must be transparent</h6>
                                </div>
                          </div>
                      <div class="card-body text-center">


                        <img id="showImage" src="{{(!empty($profile->photo)) ? url('upload/admin_images/'.$profile->photo): url('frontend/images/feature-section_01.png') }}"
                                class="shadow" width="auto" height="350px" alt="">

                      </div>
                    </div>

                <div class="mb-3">
                    <input type="file" name="photo" id="image" class="form-control" >
                </div>

            </div>


            <div class="col-12">
              <div class="d-grid">
                    <button type="button" class="btn btn-success px-5">Update</button>
                </div>

            </div>
          </div>
          </form>
    </div>
</div>
@endif

@if(Route::current()->getName() == 'admin.mission')
<div class="card">
    <div class=" card-header">
        <div class="col text-start">
            {{ __('Mission section') }}
        </div>
    </div>
    <div class="card-body">
        <form id="myForm" method="post" action="{{ route('admin.category.store') }}">
            @csrf


          <div class="row g-3">
            <div class="col-7">

                <div class="from-group mb-3">

                    <label class="form-label" for="movement_title">Title</label>
                    <textarea type="text" name="movement_title" class="form-control" id="movement_title" placeholder="Add  Title"  rows="2" cols="2"></textarea>
                    <p class="mt-1" id="movement_title_noticeArea"></p>
                </div>

                <div class="from-group mb-3" >
                    <label class="form-label" for="movement_summary">Summary</label>
                    <textarea class="form-control" name="movement_summary" id="movement_summary"  aria-label="With textarea"  rows="4" cols="4"></textarea>
                    <p class="mt-1" id="movement_summary_noticeArea"></p>
                </div>
                <div class="separator">Mission List</div>
                <div class=" text-end mb-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddMissionModal">Add Mission </button>
                </div>


                <table class=" table table-bordered table-striped table-hover datatable" style="width:100%">
                    <thead>
                        <tr class=" text-center">
                            <td width="5%">#</td>
                            <td width="20%">Icone</td>
                            <td width="55%">Title</td>
                            <td width="20%">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#</td>
                            <td>Icone</td>
                            <td>Title</td>
                            <td class="text-center ">
                                    <a href="" class=" btn btn-sm text-warning"  >
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                    <a href="" class=" btn btn-sm text-danger"  >
                                        <i class="bi bi-trash-fill"></i>
                                    </a>

                              </td>
                        </tr>
                    </tbody>
                </table>


            </div>

            <div class="col-5">


                    <div class="card border shadow-none mb-3" style="height:450px; width: ">
                        <div class=" card-header radius-10 border-0 border-start border-pink border-3">
                                <div class="">
                                  <h6 class="mb-0 text-pink">Image size will be height 605px width 790px. Background must be transparent</h6>
                                </div>
                          </div>
                      <div class="card-body text-center">


                        <img id="showImage" src="{{(!empty($profile->photo)) ? url('upload/admin_images/'.$profile->photo): url('frontend/images/our-mission-image.jpg') }}"
                                class="shadow" width="auto" height="350px" alt="">

                      </div>
                    </div>

                <div class="mb-3">
                    <input type="file" name="photo" id="image" class="form-control" >
                </div>

            </div>


            <div class="col-12">
              <div class="d-grid">
                    <button type="button" class="btn btn-success px-5">Update</button>
                </div>

            </div>
          </div>
          </form>
    </div>
</div>
@endif

@if(Route::current()->getName() == 'admin.abilities')

@endif
<div class="modal fade" id="AddMissionModal" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Mission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="from-group mb-3">
                            <label class="form-label" for="feature_icone_01">Mission Icone </label>
                            <input type="file" name="feature_icone_01" id="feature_icone_01" class="form-control" >
                    </div>
                    </div>
                    <div class="col">
                        <div class="profile-avatar text-center " >
                            <img id="showFeatureIcone01"src="{{(!empty($profile->photo)) ? url('upload/admin_images/'.$profile->photo): url('frontend/images/single-feature_01.svg') }}" class="shadow " width="120" height="120" alt="" style="background-color: #16327a;">
                        </div>
                    </div>
                </div>


                <div class="from-group mb-3">
                    <label class="form-label" for="feature_title_01">Mission Title </label>
                    <input name="feature_title_01" id="feature_title_01" type="text" class="form-control">
                    <p class="mt-1" id="feature_title_noticeArea_01"></p>
                </div>

                <div class="from-group mb-3">
                    <label class="form-label" for="feature_summary_01">Mission Summary </label>
                    <textarea type="text" name="movement_title" class="form-control" id="movement_title" placeholder="Add  Title"  rows="2" cols="2"></textarea>
                <p class="mt-1" id="movement_title_noticeArea"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
@parent
<script>

$("#slider_title").on("input", function () {
    if ($(this).val().length >= 70) {
        $("#slider_title_noticeArea").html("<font color='red'> Character limit reached. </font>");
    }
    if ($(this).val().length < 70) {
        $("#slider_title_noticeArea").html("Maximum 70 characters");
    }
});

$("#slider_summary").on("input", function () {
    if ($(this).val().length >= 150) {
        $("#slider_summary_noticeArea").html("<font color='red'> Character limit reached. </font>");
    }
    if ($(this).val().length < 150) {
        $("#slider_summary_noticeArea").html("Maximum 150 characters");
    }
});

</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection

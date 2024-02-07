@php
$segmentone = Str::ucfirst(Request::segment(2));
$segmenttwo = Str::ucfirst(Request::segment(3));
$segmentthree = Str::ucfirst(Request::segment(4));
$specialCharacters = ['@', '#', '$', '%', '&', '-', '_'];
$segment_one = str_replace($specialCharacters, ' ', $segmentone);
$segment_two = str_replace($specialCharacters, ' ', $segmenttwo);
$segment_three = str_replace($specialCharacters, ' ', $segmentthree);
@endphp

@extends('backend.layouts.backend')

@section('page_title', 'Roles Create')

@section('breadcrumb_link_one', $segment_one)
@section('breadcrumb_link_two', $segment_two)

@section('page_style')

<style>
    .form-check-label {
        text-transform: capitalize;
    }
</style>
@endsection

@section('page-content')


        <div class="card">
            <form method="POST" action="{{  route('admin.role_permission.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="from-group mb-3">
                        <label for="inputEmail4" class="form-label">Role Name </label>
                        <select class=" form-control" name="role_id" id="role_id">
                            <option> Select Roles </option>
                            @foreach ($roles as $key => $item )
                                <option value="{{ $item->id }}">{{ $item->name }} </option>
                            @endforeach

                        </select>
                    </div>
                    <div class="from-group m-3 ">
                        <div class="form-check">
                            <input name="permission_id" class="form-check-input" type="checkbox" value="" id="all_checkbox">
                            <label class="form-check-label" for="flexCheckDefault">Check All</label>
                        </div>
                    </div>

                    <div class="row">
                        @foreach ($permissions_group as $group)
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="border rounded">
                                        <div class="card-header">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="">
                                                <label class="form-check-label" for="flexCheckDefault">{{ $group->group_name
                                                    }}</label>
                                            </div>
                                        </div> <!-- End card-header -->
                                        @php
                                            $permissions = App\Models\User::getPermissionByGroup($group->group_name);
                                        @endphp
                                        <div class="card-body">
                                            @foreach ($permissions as $permission)
                                                <div class="form-check">
                                                    <input name="permission[]" id="customckck{{$permission->id}}" class="form-check-input" type="checkbox" value="{{$permission->id}}" >
                                                    <label class="form-check-label" for="flexCheckDefault">{{$permission->name}}</label>
                                                </div>
                                            @endforeach
                                        </div><!-- End card-body -->
                                    </div><!-- End border -->
                                </div><!-- End card -->
                            </div><!-- End col-md-4 -->
                        @endforeach

                    <div class="col-12">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>

                    </div><!-- End row -->
                </div><!-- End card-body -->
            </form>
        </div><!-- End card -->


@endsection
@section('scripts')
@parent
<script type="text/javascript">
    $('#all_checkbox').click(function(){
       if ($(this).is(':checked')) {
           $('input[type = checkbox]').prop('checked',true);
       }else{
            $('input[type = checkbox]').prop('checked',false);
       }
    });
</script>
@endsection

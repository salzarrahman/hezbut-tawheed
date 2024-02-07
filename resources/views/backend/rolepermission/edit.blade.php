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

@section('page_title', 'Edit Role')

@section('breadcrumb_link_one', $segment_one)
@section('breadcrumb_link_two', $segment_two)
@section('breadcrumb_link_two', $segment_three)




@section('page_style')


@endsection

@section('page-content')


    <div class="card">
        <div class="card-header">
            <h6 class="mb-0 ">Update </h6>
        </div> <!-- End card-header -->

        <div class="card-body">
            <form  method="post" action="{{ route('admin.role_permission.update',$role->id) }}">
                @csrf


                <div class="from-group mb-3">
                    <label for="inputEmail4" class="form-label">Role Name </label>
                    <h4> {{ $role->name }}</h4>


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
                        @php
                             $permissions = App\Models\User::getPermissionByGroup($group->group_name);
                        @endphp
                        <div class="card">
                            <div class="border rounded">
                                <div class="card-header">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="customckeck1" {{ App\Models\User::roleHasPermissions($role, $permission) ? 'checked' : ''  }} >
                                        <label class="form-check-label" for="flexCheckDefault">{{ $group->group_name }}</label>
                                    </div>
                                </div> <!-- End card-header -->

                                <div class="card-body">
                                    @foreach ($permissions as $permission)
                                        <div class="form-check">
                                            <input name="permission[]" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} id="customckck{{$permission->id}}" class="form-check-input" type="checkbox" value="{{$permission->id}}" >
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
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>

                </div><!-- End row -->


            </form>
        </div><!-- End card boody -->
    </div><!-- End card -->




@endsection
@section('scripts')
@parent



@endsection

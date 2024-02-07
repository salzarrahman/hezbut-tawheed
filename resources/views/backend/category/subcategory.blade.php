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

@section('page_title', 'Subcategory')

@section('breadcrumb_link_one', $segment_one)
@section('breadcrumb_link_two', $segment_two)




@section('page_style')

@endsection

@section('page-content')



      <div class="card">
        <div class="card-header py-3">
          <h6 class="mb-0">Category</h6>
        </div>
        <div class="card-body">
           <div class="row">
             <div class="col-12 col-lg-4 d-flex">
               <div class="card border shadow-none w-100">
                 <div class="card-body">
                    <form class="row g-3" id="myForm" method="post" action="{{ route('admin.subcategory.store') }}">
                        @csrf


                     <div class="col-12">
                        <label for="inputEmail4" class="form-label">Category name</label>
                        <select class="single-select select2-hidden-accessible form-select " name="category_id" id="example-select">
                            @foreach ($categories as $key=>$item)
                                <option value="{{$item->id }}">{{ $item->category }}</option>
                            @endforeach
                        </select>
                     </div>
                     <div class="col-12">
                      <label for="inputEmail4" class="form-label">Sub Category</label>
                      <input type="text" class="form-control"  name="subcategory_name" id="subcategory_name">
                    </div>

                    <div class="col-12">
                      <div class="d-grid">
                        <button class="btn btn-primary">Add Sub Category</button>
                      </div>
                    </div>
                   </form>
                 </div>
               </div>
             </div>
             <div class="col-12 col-lg-8 d-flex">
              <div class="card border shadow-none w-100">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class=" table table-bordered table-striped table-hover datatable desktop" style="width:100%">

                       <thead class="table-light">
                         <tr>
                           <th>#</th>
                           <th>Category Name</th>
                           <th>SubCategory Name</th>
                           <th>Action</th>
                         </tr>
                       </thead>
                       <tbody>
                        @foreach($subcategory as $key=> $item)
                         <tr>

                           <td>#{{ $item->id }}</td>
                           <td>{{ $item['category']['category'] }}</td>
                           <td>{{ $item->name }}</td>
                           <td>
                            <div class="d-flex align-items-center gap-3 fs-6">

                                <a href="{{ route('admin.subcategory.edit',$item->id) }}"class="btn btn-sm btn-outline-primary">
                                    <i class="far fa-edit" aria-hidden="true"></i> Edit
                                </a>

                                <a href="{{ route('admin.subcategory.destroy',$item->id) }}" class="btn btn-sm btn-outline-danger" id="delete">
                                    <i class=" far fa-trash-alt" style="color: #ff1f1f;" aria-hidden="true"></i> Delete
                                </a>

                            </div>
                           </td>
                         </tr>
                        @endforeach

                       </tbody>
                     </table>
                  </div>

                </div>
              </div>
            </div>
           </div><!--end row-->
        </div>
      </div>






@endsection
@section('scripts')
@parent
<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                subcategory_name: {
                    required : true,
                },
            },
            messages :{
                subcategory_name: {
                    required : 'Please Enter SubCategory Name',
                },
            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });

</script>


@endsection

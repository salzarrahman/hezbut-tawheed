@extends('backend.layouts.backend')

@section('page_title', 'Category')

@section('breadcrumb_link_one',Str::ucfirst(Request::segment(2)))
@section('breadcrumb_link_two',Str::ucfirst(Request::segment(3)))



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
                    <form id="myForm" method="post" action="{{ route('admin.category.store') }}">
                        @csrf
                      <div class="row g-3">
                        <div class="col-12">
                          <label class="form-label">Name</label>
                          <input type="text" name="category_name" class="form-control" id="inputEmail4" >

                          <p class=" mt-1">The name is how it appears on your site.</p>

                        </div>
                        <div class="col-12 d-none">
                          <label class="form-label">Slug</label>
                          <input type="text" class="form-control">
                          <p>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</p>
                        </div>


                        <div class="col-12">
                          <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Add New Category</button>
                          </div>
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
                         <tr class="text-center">

                           <th>ID</th>
                           <th>Name</th>
                           <th>Slug</th>
                           <th >Action</th>
                         </tr>
                       </thead>
                       <tbody>
                        @foreach($categories as $key=> $item)
                         <tr>

                           <td>#{{ $item->id }}</td>
                           <td>{{ $item->category }}</td>
                           <td>{{ $item->category_slug }}</td>
                           <td class="text-center">

                                <a href="{{ route('admin.category.edit',$item->id) }}"class="btn btn-sm btn-outline-primary">
                                    <i class="far fa-edit" aria-hidden="true"></i> Edit
                                </a>
                                <a href="{{ route('admin.category.destroy',$item->id) }}" class="btn btn-sm btn-outline-danger" id="delete">
                                    <i class=" far fa-trash-alt" style="color: #ff1f1f;" aria-hidden="true"></i> Delete
                                </a>

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


@endsection

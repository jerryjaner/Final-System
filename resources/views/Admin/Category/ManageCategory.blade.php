  @extends('Admin.master')
  @section('title')

  Manage Category

  @endsection
  @section('content')



    @error('category_name')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
             <strong>{{ $message }}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hiddden="true">&times;</span>
          </button>
        </div>
    @enderror


  <div class="card my-2">
    <div class="card-header">
      <h3 class="card-title" id="messagefont"><b>Manage Category</b></h3>
      <button type="button" class="btn btn-success btn-sm" style="float: right;" data-bs-toggle="modal" data-bs-target="#add" data-bs-whatever="@fat" id="userfont"> Add Category  </button>
    </div>

    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">

        <!-- Modal start here -->
        <div class="modal fade" id="add" tabindex="-1" aria-labelledby="add" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header text-center">

                <h5 class="modal-title w-100"  id="add">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
            <div class="modal-body">

              <form action="{{route('cate_save')}}" method="post" onsubmit="btn.disabled = true; return true;">
                  @csrf

                  <div class="form-group">
                    <label > Category Name</label>
                    <input type="text" class="form-control" 
                           name="category_name"  
                           placeholder="Enter Category Name" 
                           onkeydown="return /[a-z ]/i.test(event.key)"
                           {{-- pattern="[A-Za-z \s*]+$"
                           oninvalid="this.setCustomValidity('Letters Only are Allowed')"
                           oninput="this.setCustomValidity('')"  --}}
                           required>
                  </div>
                  <div class="form-group">
                    <label> Category Status</label>
                    <div class="radio">
                      <input  type="radio" name="category_status" value="1"  required> Active          
                      <input  type="radio" name="category_status" value="0"  required> Inactive
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
                      <button class="btn btn-primary" type="submit" name="btn">Submit</button>
                  </div>
              
              </form>
            </div>
          </div>
       </div>
    </div>    
    <!-- End of Modal --> 
    <thead>
      <tr>
        <th>#</th>
        <th>Category Name</th>
        <th>Category Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

      @php($i = 1)
      @foreach($categories  as $cate)

      <tr>
        <td>{{$i++}}</td>
        <td>{{$cate->category_name}}</td>
        <td>

          @if($cate -> category_status == 1)

          Active

          @elseif($cate -> category_status == 0)

          Inactive

          @endif

        </td>
        <td>
          <div class="btn-group">
            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" id="userfont">
              More
            </button>

            <ul class="dropdown-menu">

              @if($cate->category_status == 1)

               <li><a class="dropdown-item" href="{{route('Inactive_cate',['category_id'=>$cate->category_id])}}" ><i class="fas fa-arrow-down "  title="click to Inactive"  ></i> Click to Inactive</li></a>

              @else
              
               <li><a class="dropdown-item" href="{{route('category_active',['category_id'=>$cate->category_id])}}"> <i class="fas fa-arrow-up"  title="click to Active"  ></i> Click to Active</li></a>     

              @endif 


               <li><a href="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit{{$cate->category_id}}" data-bs-whatever="@fat">
                   <i class="fas fa-edit"  title="click to Change it" ></i>
                    Edit Category </a>
                </li>

                  <li><a class="dropdown-item"  href="{{route('cate_delete',['category_id'=>$cate->category_id])}}">
                    <i class="fas fa-trash"  title="click to Delete"></i> Delete Category </a></li>
                  </ul>
                </div>  
              </td>
            </tr>  

            <div class="modal fade" id="edit{{$cate->category_id}}" tabindex="-1" aria-labelledby="edit{{$cate->category_id}}" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="edit{{$cate->category_id}}">Update Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="modal-body">
                    <form action="{{route('cate_update')}}" method="post" onsubmit="btn.disabled = true; return true;">

                       @csrf

                       <div class="form-group">
                         <label id="userfont" >Category Name</label>
                         <input type="text" class="form-control" id="userfont" 
                                name="category_name" 
                                placeholder="Enter Category Name" 
                                value="{{$cate->category_name}}"
                                onkeydown="return /[a-z ]/i.test(event.key)"
                                required>
                         <input type="hidden" class="form-control"  name="category_id" value="{{$cate->category_id}}">
                       </div>

                       <div class="modal-footer">
                        <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
                        <button class="btn btn-primary" type="submit" name="btn">Submit</button>    
                      </div>

                    </form>
                </div>
              </div>
            </div>
          </div>

          @endforeach
        </tbody>
      </table>
    </div>
  </div>



  @endsection

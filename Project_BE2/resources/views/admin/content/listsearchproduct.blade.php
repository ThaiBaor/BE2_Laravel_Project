@EXTENDS('admin.main')


@section('content')
<form action="{{ route('searchproduct') }}" method="GET">
  <div CLASS="input-group">
    @csrf
    <input type="text" name= "keyword" id= "keyword"CLASS="form-control bg-light border-2 small " placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
    <div CLASS="input-group-append">
      <button CLASS="btn btn-primary" type="submit">
        <i CLASS="fas fa-search fa-sm"></i>
      </button>
    </div>
  </div>
  </form>
  <!-- DataTales Example -->
  <div CLASS="card shadow mb-12">
    <div CLASS="card-header py-3">
      <h6 CLASS="m-0 font-weight-bold text-primary">SEARCH RESULT </h6>
      <h6><a href="{{route('addproduct')}}" class="btn btn-primary">ADD PRODUCT</a></h6>
    </div>
    <div CLASS="card-body">
      <div CLASS="table-responsive">
        <table CLASS="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Name</th>
              <th>Image</th>
              <th>Description</th>
              <th>Color</th>
              <th>Action</th>
              <th>Price</th>
              <th>In stock</th>
              <th>Sold</th>
              <th>Type</th>
              <th>Star</th>
              <th>Number comment</th>

            </tr>
          </thead>

          <tbody>
            @foreach($products as $product)
            <tr>
              <td>{{$product->name}}</td>
              <td><img src="{{URL::asset('uploads')}}/{{$product->photo}}" alt="" width="50px" height="50px"></td>
              <td>{{$product->description}}</td>
              <td>{{$product->color}}</td>
              <td>
                <a href="{{route('getdataedt',$product->id)}}" class="btn btn-primary">Edit</a>
                <a href="{{route('deleteproduct',$product->id)}}" class="btn btn-primary">Delete</a>
              </td>
              <td>{{$product->price}}</td>
              <td>{{$product->instock}}</td>
              <td>{{$product->sold}}</td>
              <td>{{$product->type}}</td>
              <td>{{$product->star}}</td>
              <td>{{$product->number_comment}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $products->links('admin.custompagination') }}
      </div>
    </div>
  </div>

  @endsection
@extends('admin.main')
@section('content')
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Register User</h3>
                    <div class="card-body">
                        <form action="{{ route('editproduct') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="hidden" placeholder="id" id="id" value="{{$getDataProductById[0]->id}}" class="form-control" name="id" required autofocus>

                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Name" id="name" value="{{$getDataProductById[0]->name}}" class="form-control" name="name" required autofocus>
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Description" id="description" value="{{$getDataProductById[0]->description}}" class="form-control" name="description" required autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Color" value="{{$getDataProductById[0]->color}}" id="color" class="form-control" name="color" required autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Price" value="{{$getDataProductById[0]->price}}" id="price" class="form-control" name="price" required autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="In Stock" value="{{$getDataProductById[0]->instock}}" id="instock" class="form-control" name="instock" required autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Sold" value="{{$getDataProductById[0]->sold}}" id="sold" class="form-control" name="sold" required autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Type" value="{{$getDataProductById[0]->type}}" id="type" class="form-control" name="type" required autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Star" value="{{$getDataProductById[0]->star}}" id="star" class="form-control" name="star" required autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Number comment" value="{{$getDataProductById[0]->number_comment}}" id="number_comment" class="form-control" name="number_comment" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="photo" class="form-label">Photo</label>
                                <input type="file" class="form-control" id="photo" name="photo" value="{{$getDataProductById[0]->photo}}">
                                <img src="{{URL::asset('uploads')}}/{{$getDataProductById[0]->photo}}" alt="" width="50">
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Sign up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
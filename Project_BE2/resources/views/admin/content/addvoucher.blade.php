@EXTENDS('admin.main')
@section('content')
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header text-center">ADD VOUCHER</h3>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Ma Voucher" id="mavoucher" class="form-control" name="mavoucher" required autofocus>
                                @if ($errors->has('mavoucher'))
                                <span class="text-danger">{{ $errors->first('mavoucher') }}</span>
                                @endif
                            </div>
                            <input type="date" placeholder="Create_at" id="create_at" name="create_at">
                            <input type="date" placeholder="Expired_at" id="expired_at" name="expired_at">
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">ADD VOUCHER</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
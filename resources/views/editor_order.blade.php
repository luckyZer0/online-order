@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success d-block" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        Create Order
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card-body">
                        <form action="{{ route('order.update', ['id' => $order_detail->id]) }}" method="post">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label for="">Receipt Number</label>
                                <input type="text" name="rec_no" class="form-control"
                                    value="{{ $order_detail->rec_no }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <textarea type="text" name="address" class="form-control">{{ $order_detail->address }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Tel. Number</label>
                                <input type="phone" name="tel_no" class="form-control"
                                    value="{{ old('tel_no', $order_detail->tel_no) }}">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid
                                    
                                @enderror"
                                    value="{{ $order_detail->email }}">
                                @error('email')
                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="text" name="date" class="form-control" value="{{ $order_detail->date }}"
                                    readonly>
                            </div>
                            <button class="btn btn-primary mt-3" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

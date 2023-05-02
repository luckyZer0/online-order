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
                        <form action="{{ route('order.create') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Receipt Number</label>
                                <input type="text" name="rec_no" class="form-control" value="{{ $new_rec_no }}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <textarea type="text" name="address" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Tel. Number</label>
                                <input type="phone" name="tel_no" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="text" name="date" class="form-control" value="{{ now() }}"
                                    readonly>
                            </div>
                            <button class="btn btn-primary mt-3" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

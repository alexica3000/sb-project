@extends('welcome')

@section('title', 'Contacts');

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-4 mb-4 font-italic border-bottom">
            Contacts
        </h3>

        <form action="{{ route('store_message') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Message</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection

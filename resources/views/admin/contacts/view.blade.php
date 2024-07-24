@extends('dashboard')
@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form method="get" action="{{ route('contact-us.list') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="name">User_Name:</label>
                                        <input type="text" name="name" class="form-control" disabled id="name"
                                            value="{{$contact->user_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="email">User_Email:</label>
                                        <input type="email" class="form-control" name="email" id="email" disabled
                                            value="{{$contact->user_email}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="subject">Subject:</label>
                                        <input type="text" name="subject" class="form-control" disabled id="subject"
                                            value="{{$contact->subject }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="message">Message:</label>
                                        <textarea class="form-control" name="message" id="message" cols="10"
                                            rows="5">{{$contact->message}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Back to List">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
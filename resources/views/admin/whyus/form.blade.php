@extends('dashboard')
@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('why-us.store',isset($whyUs->id)?$whyUs->id:"") }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Title:</label>
                                        <input type="text" name="title" class="form-control" id="title"
                                            value="{{ $whyUs?$whyUs->title:'' }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="description">Description:</label>
                                        <textarea class="form-control" name="description" id="description"
                                            rows="3">{{ $whyUs?$whyUs->description:'' }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('dashboard')
@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('services.store',isset($service->id)?$service->id:"") }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Title:</label>
                                        <input type="text" name="title" class="form-control" id="title"
                                            value="{{ $service?$service->title:'' }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="image">Image:</label>
                                        <div class="controls">
                                            <input type="file" id="image" name="image" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="description">Description:</label>
                                        <textarea class="form-control" name="description"
                                            id="exampleFormControlTextarea1"
                                            rows="3">{{ $service?$service->description:'' }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <img id="showImage"
                                                src="{{ $service ? asset('storage/' . $service->image) : asset('no_image.jpg') }}"
                                                style="width: 100px; height: 100px;">
                                        </div>
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
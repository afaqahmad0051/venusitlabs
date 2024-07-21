@extends('dashboard')
@section('content')
<div class="container-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post"
                            action="{{ route('testimonials.store',isset($testimonial->id)?$testimonial->id:'') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Name:</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            value="{{ $testimonial?$testimonial->name:'' }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="qualification">Qualification:</label>
                                        <input type="text" name="qualification" class="form-control" id="qualification"
                                            value="{{ $testimonial ? $testimonial->qualification : ''}}">
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
                                        <label class="form-label" for="client_review">Client Review:</label>
                                        <textarea class="form-control" name="client_review" id="client_review"
                                            rows="3">{{ $testimonial?$testimonial->client_review:'' }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <img id="showImage"
                                                src="{{ $testimonial && $testimonial->image ? asset('storage/' . $testimonial->image) : asset('no_image.jpg') }}"
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
@extends('frontend_master')
@section('content')

<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-sm-4">
            <h2>Image</h2>
            <h5>Photo of me:{{$image->title}}</h5>
            <div class="fakeimg">{{Html::image(Config::get('image.thumb_folder').'/'.$image->image)}}</div>
            <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
            <h3>Some Links</h3>
        <a href="{{url('/all')}}" class="btn btn-primary">Show All Images</a>
        </div>
        <div class="col-sm-8">
            <h2>All Image Source</h2>
            <h5>sep 26, 2019</h5>
            <div class="form-group">
                    <label for="pwd">Direct Image Url:</label>
                    <input class="form-control" type="text" width="100%"
                        value="{{URL::to(Config::get('image.upload_folder').'/'.$image->image)}}" name="" id="" />
                </div>
                <div class="form-group">
                    <label for="usr">Thumbnail Forum BBcode</label>
                    <input class="form-control" oneclick="this.select()" width="100%" value="[url={{URL::to('snatch/'.$image->id)}}][img]
                {{URL::to(Config::get('image.thumb_folder').'/'.$image->image)}}[/img][/url]" type="text" name="" id="">
                </div>
                <div class="form-group">
                    <label for="pwd">Thumbnai HTML Code:</label>
                    <input class="form-control" type="text" oneclick="this.select()" width="100%"
                        value="{{Html::entities(Html::link(URL::to('snatch/'.$image->id), Html::image(Config::get('image.thumb_folder').'/'.$image->image)))}}"
                        name="" id="">
                </div>
        </div>
    </div>
</div>
@endsection
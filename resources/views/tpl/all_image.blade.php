@extends('frontend_master')

@section('content')
<div class="container">
    <div class="row">
        <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="gallery-title">Gallery</h1>
        </div>
        <br />
        @if (count($images))
        @foreach ($images as $item)
        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
            <a href="{{URL::to('snatch/'.$item->id)}}">
                {{Html::image(Config::get('image.thumb_folder', ['class'=>"img-responsive"]).'/'.$item->image)}}
            </a>
        </div>

        @endforeach
        
    </div>
    <ul class="pagination">
        <li class="page-item">{{$images->links()}}</li>
      </ul>
</div>

</section>

@else
<p>No images Uploaded yet!, {{Html::link('/', 'cate to upload one?')}}</p>
@endif
@endsection
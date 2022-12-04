@extends('clients.masterlayouts')
@section('title', 'Tin tức | Fresh Mart')
@section('content')
<div id="content-news">
    <div class="container">
        <div class="content-about">
            @foreach($news as $key => $value)
            <div class="content-item">
                <a href="{{URL::to('news/details/' . $value['id'])}}" class="content-item--img">
                    <img src="{{asset('images/news/' . $value['image'])}}" alt="">
                </a>
                <div class="content-item--date">
                    <p class="post-date">Chủ Nhật, 16 tháng 10, 2022</p>
                </div>
                <div class="content-item--title">
                    <a href="{{URL::to('news/details/' . $value['id'])}}">{!!$value['title']!!}</a>
                </div>
                <div class="content-item--status">
                    <p>{!!$value['content']!!}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
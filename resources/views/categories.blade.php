@extends('layout.front')
@section('title', 'All posts for category - '.$categoryname .'-')
@section('slider-item', 'Category')
@section('content')

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <h2 class="mb-4">Posts For Category {{$categoryname}}</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
        </div>
        <div class="row d-flex">

            @foreach ($posts as $post)
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="{{route('post',['id'=>$post->id,])}}" class="block-20"><img src="{{asset('storage/' . $post->url)}}" width="350px" height="250px">
                    </a>
                    <div class=" text py-4 d-block">
                        <div class="meta">
                            <div>{{$post->created_at->format('M d, Y')}}</div>
                            <div>{{$post->category->name}}</a></div>
                        
                        </div>
                        <h3 class="heading mt-2"><a href="{{route('post',['id'=>$post->id,])}}">{{$post->title }}</a></h3>
                        <p>{{ strip_tags(\Illuminate\Support\Str::limit($post->body,120))}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
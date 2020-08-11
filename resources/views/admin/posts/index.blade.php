@extends('layout.admin')
@section('title','Admin Dashboard -Posts')
@section('content')
<section class="wrapper">
    <!-- row -->
    <div class="row mt">
        <div class="col-md-12">
            @if(session('message_flash'))
            <div class="alert alert-success">
                {{session('message_flash')}}
            </div>
            @endif
            <div style="direction: rtl" style="margin: 120">
                <a href="{{route('admin.posts.create')}}" class="btn btn-success">New Post <i class="fa fa-plus"></i></a>
            </div>
            <br>
            
            <br>
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                    <h4><i class="fa fa-angle-right"></i> Posts Table</h4>
                    <hr>
                    <thead>
                        <tr>
                           
                            <th>Title</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Tags</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (count($posts)>0)
                        @foreach ($posts as $post)
                        <tr>
                           
                            <td>{{$post->title}}</td>
                            <td>
                                <img src="{{asset('storage/'.$post->url)}}" height="50px" width="80px"></td>

                            </td>
                           
                            <td>{{$post->category->name}}</td>
                            <td>
                                @if($post->tags->toArray())
                                {{ implode (',',$post->tags->pluck('name')->toArray())}}
                                @else
                                no tags
                                @endif
                            </td>
                            
                            <td>{{$post->created_at}}</td>
                            <td>{{$post->updated_at}}</td>
                            
                            <td>
                                <a href="/post/{{$post->id}} "class="btn btn-success btn-xs"><i class="fa fa-eye" title="view"></i></a>
                                <a href="{{route('admin.posts.edit' , ['id'=>$post->id ] )}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil" title="edit"></i></a>
                                <form method="post" action="{{route('admin.posts.delete', ['id'=>$post->id ])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button style="margin-left: 52px; margin-top: -40px" type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash" title="delete"></i></button>
                                </form>
                            </td>
                            @endforeach
                            @else
                            <td colspan="5" class="text-center">
                                <h5>No Posts</h5> <br>
                            </td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /content-panel -->
        </div>
        <!-- /col-md-12 -->
    </div>
    <!-- /row -->
</section>
{{$posts->links()}}
@endsection
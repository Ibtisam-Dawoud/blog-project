@extends('layout.admin')
@section('title','Admin Dashboard -Edit')
@section('content')
<section class="wrapper">
  @if(count($errors)>0)
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>
        {{$error}}
      </li>
      @endforeach
    </ul>
  </div>
  @endif

  <div class="row mt">
    <div class="col-lg-12">
      <h4><i class="fa fa-angle-right"></i> Add Post</h4>
      <div class="form-panel">
        <div class=" form">
          <form method="post" action="{{route('admin.posts.update' , ['id'=>$post->id ] )}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label class="control-lable">Title</label>
              <div>
                <input type="text" name="title" class="form-control  @error('title') is-invalid @enderror" value="{{$post->title}}">
                @error('title')
                <p class="text-danger">{{$message}}</p>
                @enderror
              </div>
            </div>
            
            <div class="form-group">
                <label for="category">Select a category</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach(App\Category::all() as $category)
                    <option value="{{$category->id}}"
                    
                    @if($post->category->id == $category->id)
                        selected
                    @endif

                    >{{$category->name}}</option>
                    @endforeach
                </select>
            </div>


           
              <div class="form-group">
                <label class="control-label">Change Image</label>
                <div class="d-flex">
                  
                  <label for="url">Upload Publication File: ({{ $post->url }})</label>
                  <input type="file" name="url"  id="url" class="form-control @error('url') is-invalid @enderror"  value="{{ $post->url }}" >
                  <img src="{{ asset('storage/' . $post->url) }}" class="img-thumbnail" width=" 100" height="100" class="ml-auto">
                </div>
                  @error('url')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>
            

            <div>
            
            </div>

            <div class="form-group">
                <label for="tag">Select a tag</label>
                    @foreach($tags as $tag)
                    <div class="checkbox">
                    <label ><input type="checkbox" name="tags[]" value="{{$tag->id}}"
                    
                    @foreach($post->tags as $t)
                        @if($tag->id == $t->id)
                            checked
                        @endif
                    @endforeach
                    
                    >{{$tag->name}}</label>
                    </div>
                   
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="control-lable">Body</label>
                <div>
                  <textarea type="text" name="body" class="form-control @error('body') is-invalid @enderror" rows="6"> {{$post->body}} </textarea>
                  @error('body')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
              </div>
            <button type="submit" class="btn btn-theme">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</section>
@endsection
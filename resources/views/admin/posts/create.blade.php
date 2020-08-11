@extends('layout.admin')
@section('title','Admin Dashboard -Add')
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

                                        <form method="post" action="{{route('admin.posts.store')}}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                        <label class="control-lable">Title</label>
                                                        <div>
                                                                <input type="text" name="title" value="{{old('title')}}" class="form-control  @error('title') is-invalid @enderror">
                                                                @error('title')
                                                                <p class="text-danger">{{$message}}</p>
                                                                @enderror
                                                        </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="category">Select a category</label>
                                                    <select name="category_id" id="category_id" class="form-control">
                                                        @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                        <label class="control-lable">Image</label>
                                                        <div>
                                                                <input type="file" name="url" class="form-control @error('url') is-invalid @enderror">
                                                                @error('url')
                                                                <p class="text-danger">{{$message}}</p>
                                                                @enderror
                                                        </div>
                                                        <br>
                                                       

                                                </div>
                                                <div class="form-group">
                                                    <label for="tag">Select a tag</label>
                                                        @foreach($tags as $tag)
                                                        <div class="checkbox">
                                                        <label ><input type="checkbox" name="tags[]" value="{{$tag->id}}">{{$tag->name}}</label>
                                                        </div>
                                                       
                                                        @endforeach
                                                    </select>
                                                </div>
                                               

                                                <div class="form-group "  >
                                                        <label class="control-lable" >Body</label>
                                                        <div >
                                                                <textarea id="body"  name="body"  value="{{old('body')}}" class="form-control @error('body') is-invalid @enderror"> {{old('body')}}</textarea>
                                                                @error('body')
                                                                <p class="text-danger">{{$message}}</p>
                                                                @enderror
                                                        </div>
                                                </div>

                                             <div class="form-group">
                                                        <button class="btn btn-theme" type="submit">Save</button>
                                                </div>
                                </div>
                                </form>
                        </div>
                        <!-- /form-panel -->
                </div>
                <!-- /col-lg-12 -->
        </div>
        </div>
</section>
@endsection


										
											
@section('styles')

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
        $('#body').summernote({
          placeholder: 'Hello stand alone ui',
          tabsize: 2,
          height: 120,
          toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
          ]
        });
      </script>
    
@endsection
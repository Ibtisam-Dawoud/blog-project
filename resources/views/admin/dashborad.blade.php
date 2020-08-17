@extends('layout.admin')
@section('title','Admin Dashboard -Users')
@section('content')
<section class="wrapper">
    <div class="row">
        <div class="col-lg-9 main-chart">
            <!-- /row -->
            <div class="row">
                <!-- WEATHER PANEL -->
                <!-- /col-md-4-->
                <!-- DIRECT MESSAGE PANEL -->
                <div class="col-md-8 mb">
                    <!-- /Message Panel-->
                </div>
                <!-- /col-md-8  -->
            </div>
            <div class="row" style="margin-left:150px;">
                <!-- TWITTER PANEL -->

                
                <div class="col-md-4 mb">
                    <!-- INSTAGRAM PANEL -->
                    <div class="instagram-panel pn">
                        <i class="fa fa-newspaper fa-4x"></i>
                        <p>Total Posts<br />
                            {{count(App\Post::get())}}
                        </p>
                        <p><i class="fa fa-comment"></i> {{count(App\Comment::get())}}</p>
                      
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 mb">
                    <div class="darkblue-panel pn">
                        <div class="darkblue-header">
                            <br><br><br>
                            <i class="fa fa-tags fa-4x"></i>
                            <h5>Total Tags</h5>
                            <h5>{{count(App\Tag::get())}}</h5>
                        </div>
                    </div>
                    <!--  /darkblue panel -->
                </div>
                <!-- /col-md-4 -->


                <div class="col-md-4 col-sm-4 mb">
                    <!-- REVENUE PANEL -->
                    <div class="green-panel pn">
                      
                      <div class="chart mt">
                        <p class="mt"><b><h5>Total Categories</h5></b><br/><h5>{{count(App\Category::get())}}</h5></p>
                      </div>
                     
                    </div>
                  </div>
                  <!-- /col-md-4 -->
                </div>
            </div>
            <!-- /row -->

            <!-- /row -->
        </div>

    </div>
    <!-- /row -->
</section>
@endsection
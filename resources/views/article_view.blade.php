@include('layouts.header')
<!-- Content Header (Page header) -->
<!-- Main content -->

<section class="content">
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Author</h3>
                </div>
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{$Profile->avatar}}" alt="User profile picture">

                    <h3 class="profile-username text-center">{{$user->name}}</h3>
                    <p class="text-muted text-center">@if(!$user->is_admin) Writer @else Admin @endif</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Status</b> <a class="pull-right">{{$article->status}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Words</b> <a class="pull-right">{{$article->total_words}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Characters</b> <a class="pull-right">{{$article->total_chars}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Paragraphs</b> <a class="pull-right">{{$article->total_paras}}</a>
                        </li>

                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <!-- Profile Image -->

            <div class="well" style="background: #fff;">
                <div class="text-right">
                    @if($article->status === 'Pending')
                    <form action="/article/approved" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="article_id" value="{{$article->article_id}}">
                        @if(auth()->user()->is_admin)
                            <button type="submit" class="btn btn-success">Approved this article</button>
                        @endif
                        <a href="/article/updater/{{$article->article_id}}" class="btn btn-warning">Edit this article</a>
                    </form>
                    @elseif($article->status === 'Approved')
                        <form action="/article/used" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="article_id" value="{{$article->article_id}}">
                            @if(auth()->user()->is_admin)
                                <button type="submit" class="btn btn-info">Use this article</button>
                            @endif

                        </form>
                    @else
                        <a href="/article/updater/{{$article->article_id}}" class="btn btn-warning">Edit this article</a>
                    @endif
                </div>
                <h2 style="color: #8a8989;font-weight: 600;font-size: 32px;margin: 13px 0px;">{{$article->title}}</h2>
                <table class="table table-bordered">
                    <tr>
                        <th>Status</th>
                        <th>Words</th>
                        <th>Characters</th>
                        <th>Paragraphs</th>
                    </tr>
                    <tr>
                        <td> <span class="label @if($article->status === 'Pending') label-warning @elseif($article->status === 'Approved') label-success @elseif($article->status === 'Used') label-info @endif">{{$article->status}}</span></td>
                        <td>{{$article->total_words}}</td>
                        <td>{{$article->total_chars}}</td>
                        <td>{{$article->total_paras}}</td>
                    </tr>
                </table>
                <div class="clearfix">
                    <div class="pull-left">
                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i> posted {{$article->created_at->format('M. Y')}}
                    </div>
                    <div class="pull-right">

                        <?php $cat = explode(',',$article->cat); ?>
                        @foreach($cat as $c)
                            <span class="label label-primary"><i class="fa fa-tag" aria-hidden="true"></i> {{$c}}</span>
                        @endforeach
                        <span class="label label-success"><i class="fa fa-language" aria-hidden="true"></i> {{$article->lang}}</span>

                    </div>
                </div>
            </div>

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Summary</h3>
                </div>
                <div class="box-body box-profile" >
                    <p>
                        {!!$article->summary !!}
                    </p>
                    <hr>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Article</h3>
                    <div class="pull-right box-tools">
                        last updated {{$article->updated_at->diffForHumans()}}
                     </div>

                </div>
                <div class="box-body box-profile" style="padding: 20px">

                    <hr>
                    <div class="article-view-content">
                        {!!$article->text !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->


@include('layouts.footer')
@if (Session::has('sweet_alert.alert'))
    @include('sweet::alert')
@endif

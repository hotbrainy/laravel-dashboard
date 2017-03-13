@include('layouts.header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Article Composer
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/article">Articles</a></li>
        <li class="active">Composer</li>
    </ol>
</section>
<br>
<!-- Main content -->
<section class="content">
    <div class="row">
        <form action="/article/compose/store" method="post">
        <div class="col-md-9 ">
                {{csrf_field()}}
                <div class="box box-info editor-box">
                    <!-- /.box-header -->
                    <div class="box-body pad">
                        <div class="form-group article-title {{ $errors->has('title') ? ' has-error' : '' }}">
                            <label>Article Title</label>
                            <input type="text" name="title" value="{{old('title')}}" data-artile-title class="form-control" placeholder="Title">
                            @if($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('summary') ? ' has-error' : '' }}">
                            <label>Summary</label>
                            <textarea class="form-control" value="{{old('summary')}}" data-artile-sum  name="summary" rows="3" placeholder="You article Summary what you are going to represent.!" >{{old('summary')}}</textarea>
                            @if($errors->has('summary'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('summary') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group {{ $errors->has('composer') ? ' has-error' : '' }}">
                            <label>Compose</label>
                            <textarea id="editor1" class="hide" name="composer" rows="10" cols="80">
                               {{old('composer')}}
                            </textarea>
                            @if($errors->has('composer'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('composer') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group text-right">
                            <button onclick="startReview()" type="button" class="btn btn-warning submit-article-btn " >Continue</button>
                        </div>
                    </div>
                    <div class="overlay">
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                </div>
                <input type="hidden" data-article-para name="para_count">
                <input type="hidden" data-article-word name="word_count">
                <input type="hidden" data-article-char name="char_count">


            <!-- /.box -->
        </div>
        <div class="col-md-3">
            <div class="box box-info">
                <!-- /.box-header -->
                <div class="box-header with-border">
                    <h3 class="box-title">Categories</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <div class="box-body pad">
                    <div class="form-group col-md-12 {{ $errors->has('cat') ? ' has-error' : '' }}">
                       <?php  $cat_array = $category;  $n = 0;$check = '';?>
                        @foreach($cat_array as $cat)
                            @if(old('cat'))
                                   @if(in_array($cat->name, old('cat')))
                                           <?php $check = "checked"; ?>
                                   @else
                                           <?php $check = ""; ?>
                                   @endif
                           @endif
                        <div class="checkbox">
                            <label>
                                <input name="cat[]" data-artile-cat value="{{$cat->name}}" type="checkbox" {{$check}}>
                                {{$cat->name}}
                            </label>
                        </div>
                         <?php $n++; ?>
                        @endforeach
                           @if($errors->has('cat'))
                               <span class="help-block">
                                    <strong>{{ $errors->first('cat') }}</strong>
                                </span>
                           @endif
                    </div>
                </div>
            </div>

            <div class="box box-info">
                <!-- /.box-header -->
                <div class="box-header with-border">
                    <h3 class="box-title">Languages</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <div class="box-body pad">
                    <div class="form-group article-title col-md-12">
                        <select class="form-control" name="lang">
                            <option value="English">Primary Language</option>
                            <?php  $lang_array = array('English','Hindi','Urdu'); ?>
                            @foreach($lang_array as $lang)
                                <option value="{{$lang}}" @if($lang === old('lang'))selected @endif >{{$lang}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.col-->



            <div id="article-review" class="modal " tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content fade-scale">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Article Review</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box box-widget widget-user">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-aqua-active">
                                    <h3 class="widget-user-username" data-modal-artile-title>Untitled</h3>
                                    <h5 class="widget-user-desc" data-modal-artile-sum></h5>
                                </div>
                                <div class="box-footer">
                                    <div class="row">
                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                                <h5 class="description-header" data-modal-article-para>0</h5>
                                                <span class="description-text">Paragraphs</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                                <h5 class="description-header" data-modal-article-word>0</h5>
                                                <span class="description-text">Words</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4">
                                            <div class="description-block">
                                                <h5 class="description-header"  data-modal-article-char>0</h5>
                                                <span class="description-text">Characters</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Keep Editing</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

        </form>
    </div>
    <!-- ./row -->
</section>
<!-- /.content -->

@include('layouts.footer')

<script>
    $('#editor1').ckeditor({
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}',
        skin : 'bootstrapck',
        disallowedConten : 'h1 h2 h3 p',

    });

    CKEDITOR.on('instanceReady', function() {
            $('.editor-box').find('.overlay').remove();
    });



    $(window).load(function() {

        $("[data-article-para]").on("change", function() {
            $("[data-modal-article-para]").text($(this).val());
        });
        $("[data-article-word]").on("change", function() {
            $("[data-modal-article-word]").text($(this).val());
        });
        $("[data-article-char]").on("change", function() {
            $("[data-modal-article-char]").text($(this).val());
        });

        $("[data-artile-title]").on("change", function() {
            if($.trim($(this).val()).length > 0){
                $("[data-modal-artile-title]").text($(this).val());
            }else{
                $("[data-modal-artile-title]").text('Untitled');
            }
        });






         $("[data-artile-sum]").on("change", function() {
            $("[data-modal-artile-sum]").text($(this).val());
        });
        @if($errors->count() > 0)

                $("[data-modal-artile-title]").text($("[data-artile-title]").val());
                $("[data-modal-artile-sum]").text($("[data-artile-sum]").val());
        @endif




          CKEDITOR.on('instanceReady', function () {
            $.each(CKEDITOR.instances, function (instance) {
                CKEDITOR.instances[instance].document.on("keyup", CK_jQ);
                CKEDITOR.instances[instance].document.on("paste", CK_jQ);
                CKEDITOR.instances[instance].document.on("keypress", CK_jQ);
                CKEDITOR.instances[instance].document.on("blur", CK_jQ);
                CKEDITOR.instances[instance].document.on("change", CK_jQ);
            });
        });

        function CK_jQ() {
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
        }


    });


    function startReview(){
        if($.trim($("[data-artile-title]").val()) === ''){
            $("[data-artile-title]").focus();
            $("[data-artile-title]").parent().addClass('has-error');
            return false;
        }else{
            $("[data-artile-title]").parent().removeClass('has-error');
        }

        if($.trim($("[data-artile-sum]").val()) === ''){
            $("[data-artile-sum]").focus();
            $("[data-artile-sum]").parent().addClass('has-error');
            return false;
        }else {
            $("[data-artile-sum]").parent().removeClass('has-error');
        }

        if($.trim($('#editor1').val()) === ''){
            $('#editor1').focus();
            $('#editor1').parent().addClass('has-error');
            return false;
        }else {
            $('#editor1').parent().removeClass('has-error');
        }

       /* if($.trim($('[data-artile-cat]:checked').val()) === ''){
            $('[data-artile-cat]').parent().parent().parent().addClass('has-error');
            return false;
        }else {
            $('[data-artile-cat]').parent().parent().parent().removeClass('has-error');
        }*/




        $("[data-artile-cat]:checked").each(function(){
            console.log($(this).val());
        });
        $('#article-review').modal('show');
    }

    // Instance the tour
    var tour = new Tour({
        steps: [
            {
                element: ".article-title",
                title: "Title of my step",
                content: "Content of my step",
                backdrop: true,
            },
        ]});

    // Initialize the tour
    tour.init();

    // Start the tour
    tour.start();

</script>
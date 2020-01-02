@extends('admin.layouts.master')

@section('title', '編輯文章')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                編輯文章 <small>編輯文章內容</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-edit"></i> 文章管理
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <!--單元練習< 練習3-1> 編輯 create.blade.php 及 edit.blade.php-->
    <!--單元練習< 練習4-2> 將錯誤訊息區塊做成樣板-->
    @include('admin.layouts.partials.validation')
    <!-- /.row -->
    <!--單元練習< 練習6-2>  修改 edit.blade.php表單-->
    <div class="row">
        <div class="col-lg-12">
            <form action="/admin/posts/{{$post->id}}" method="POST" role="form">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="form-group">
                    <label>標題：</label>
                    <input name="title" class="form-control" placeholder="請輸入文章標題" value="{{$post->title}}">
                </div>

                <div class="form-group">
                    <label>內容：</label>
                    <textarea name="content" class="form-control" rows="10">{{$post->content}}</textarea>
                </div>

                <div class="form-group">
                    <label>精選？</label>
                    <select name="is_feature" class="form-control" >
                        <option value="0" {{ $post->is_feature?'':'SELECTED' }}>否</option>
                        <option value="1" {{ $post->is_feature?'SELECTED':'' }}>是</option>
                    </select>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-success">更新</button>
                </div>

            </form>

            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

        </div>
    </div>
    <!-- /.row -->
@endsection

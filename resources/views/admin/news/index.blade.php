@extends('layouts.admin')
@section('title', '登録済みニュースの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h1>NEWS LIST</h1>
        </div>
        <div class="row">
            <div class="col-md-5">
                <a href="{{ action('Admin\NewsController@add') }}" role="button" class="btn btn-primary">NEW POST</a>
            </div>
            <div class="col-md-7">
                <form action="{{ action('Admin\NewsController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-1">TITLE</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="cond_title" value={{ $cond_title }}>
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="SEARCH">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="admin-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table-dark t-line">
                        <!-- <table border=3 bordercolor="#7facc9"> -->
                    <!-- <table border="0"> -->
                    <!-- <table class="table table-dark t-line"> -->
                        <thead>
                            <tr align="center">
                                <th width="10%">ID</th>
                                <th width="20%">TITLE</th>
                                <th width="50%">POST</th>
                                <th width="10%">OPERATION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $news)
                                <tr>
                                    <th>{{ $news->id }}</th>
                                    <td>{{ str_limit($news->title, 100) }}</td>
                                    <td>{{ str_limit($news->body, 250) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\NewsController@edit', ['id' => $news->id]) }}">EDIT</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Admin\NewsController@delete', ['id' => $news->id]) }}">DELETE</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- </table> -->
                </div>
            </div>
        </div>
    </div>
@endsection
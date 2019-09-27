@extends('layouts.app')

@section('content')

    <div class="container">
        @if (auth()->check())
            <br>
            <button class="btn btn-success float-right" data-toggle="modal" data-target="#addList">اضافه کردن دسته</button>
            <br><br><br><br><br><br>
        @endif

    <!-- Modal -->
        <div class="modal fade" id="addList" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title ">اضافه کردن دسته</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div align="right" dir="rtl">
                            <form action="{{route('post-list')}}" method="post" role="form">
                                @csrf
                                <div class="form-group">
                                    <label for="name">نام دسته</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                                </div>
                                <div class="form-group">
                                    <label for="description">توضیحات دسته</label>
                                    <input type="text" class="form-control" name="description" id="description"
                                           value="{{old('description')}}">
                                </div>
                                <button type="submit" class="btn btn-primary col-md-12">تایید</button>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <h1 align="center">دسته بندی کتب</h1>
        <br>
        <div class="row ">
            @foreach($lists  as $list)
                <div class="col-md-4 text-center">

                    <div class="card mb-4">

                        <div class="card-header">
                            <a href="{{route('list-book',['group' => $list->id])}}">{{$list->name}}</a>
                        </div>

                        <div class="card-body">
                            {{$list->description}}
                        </div>

                    </div>

                </div>

            @endforeach

        </div>
    </div>

@endsection

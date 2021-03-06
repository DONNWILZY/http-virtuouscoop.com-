@extends('layouts.admin')

@section('title', 'Edit Paid To Click Advertisement')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">face</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Link Share Section -
                        <small class="category">Edit Link Share Advertisement</small>
                    </h4>
                    <form action="{{route('admin.link.update', ['id'=>$advertisement->id])}}" method="post">
                        {{csrf_field()}}

                        @if(count($errors) > 0)
                            <div class="alert alert-danger alert-with-icon" data-notify="container">
                                <i class="material-icons" data-notify="icon">notifications</i>
                                <span data-notify="message">

                                    @foreach($errors->all() as $error)
                                        <li><strong> {{$error}} </strong></li>
                                    @endforeach

                            </span>
                            </div>
                        @endif


                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group label-floating">

                                    <label  class="control-label" for="title">Title</label>
                                    <input id="title" name="title" type="text" value="{{$advertisement->title}}" class="form-control">

                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group label-floating">

                                    <label  class="control-label" for="ptc">Website Link</label>
                                    <input id="ptc" name="link" type="url" value="{{$advertisement->link}}" class="form-control">

                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group label-floating">
                                    <select class="selectpicker" name="membership_id" data-style="btn btn-warning btn-round" title="Select Membership" data-size="7">
                                        @foreach($memberships as $membership)

                                            <option value="{{$membership->id}}"

                                                    @if($advertisement->membership->id == $membership->id)

                                                    selected

                                                    @endif

                                            > {{$membership->name}} </option>

                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="rewards">Rewards</label>
                                    <input id="rewards" name="rewards" type="text" value="{{$advertisement->rewards}}" class="form-control">

                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group label-floating">

                                    <label  class="control-label" for="details">Details</label>
                                    <textarea class="form-control" name="details" id="details" rows="10"> {{$advertisement->details}}</textarea>

                                </div>
                            </div>
                        </div>

                        <a href="{{route('admin.link.index')}}" class="btn btn-rose">Cancel</a>

                        <button type="submit" class="btn btn-success pull-right">Save Changes</button>

                        <div class="clearfix"></div>

                    </form>

                </div>
            </div>
        </div>

    </div>

@endsection
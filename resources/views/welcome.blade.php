@extends('layouts.master')
@section('title', 'Pre Election Polling')
@section('content')
  <div class="row">
          
        <div class="col-md-4"></div>

        <div class="col-md-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-header"><span class="fa fa-line-chart"></span> {{$poll->title}}</h3>
                </div>
                <div class="card-block">
                    <form method="post" action="/submit-poll">
                      @csrf
                    <div class="form-group">
                        <label for="constituency_name"><strong>Constituency : </strong></label>
                        <select class="form-control" id="constituency_name" name="constituency_id" required>
                        <option value="">Select Your Constituency</option>
                        <?php foreach($constituencies as $constituency): ?>
                        <option value="<?= $constituency->id ?>"><?=$constituency->name ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <ul class="list-group">
                        @foreach($poll_options as $poll_option)
                            <li class="list-group-item">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="poll_option_id" value="{{$poll_option->id}}" required>{{ $poll_option->value }}
                                    </label>
                                </div>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
                <div class="card-footer text-xs-center">
                    <button type="submit" class="btn btn-primary btn-block btn-sm">Vote</button>
                    <a href="/poll-result" class="small">View Result</a>
                </div>
                <input type="hidden" name="poll_id" value="{{$poll->id}}" >
            </div>
        </div>
    

        <link rel="stylesheet" href="assets/main.css">

  </div>
@stop
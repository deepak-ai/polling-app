@extends('layouts.master')
@section('title', 'Result Pre Election Polling')
@section('content')
  <div class="row">
        <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                @foreach($poll_options as $poll_option)
                <th scope="col">{{$poll_option['value']}}</th>
                @endforeach
                
                </tr>
            </thead>
            <tbody>
                @foreach($results as $result)
                <tr>
                <th scope="row">{{ 'Constituency '.$result[0]['constituency_id'] }}</th>
                  @foreach($result as $poll_option)
                  <td>{{$poll_option['votes']}}</td>
                  @endforeach
                </tr>
                @endforeach
              
            </tbody>
            </table>
        </div>
        
    </div>
  @stop
        
   
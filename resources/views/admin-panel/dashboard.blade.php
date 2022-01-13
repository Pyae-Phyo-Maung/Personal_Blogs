@extends('admin-panel.master')
@section('title','Personal Blogs Admin')
@section('main')
<div class="container">
<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                  <i class="fab fa-artstation float-right"></i>     
                  <h3>{{$postCount}}</h3>   
                  <p>Post </p>
              </div>
              <a href="{{url('admin/posts')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <br>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                   <i class="fab fa-battle-net float-right"></i>
                   <h3>{{$projectCount}}</h3>
                   <p>Project</p>
              </div>
              <a href="{{route('projects.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <br>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                  <i class="fas fa-user float-right"></i>
                  <h3>{{$userCount}}</h3>
                  <p>Users</p>
              </div>
             <a href="{{url('admin/users')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <br>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <i class="fas fa-users float-right"></i>
                <h3>{{$studentCount->count}}</h3>
                <p>Students</p>
              </div>
              <a href="{{url('admin/student_counts')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
                
          <div class="container">
          <br>     <br>
          <!-- <h3 class="f-20">Skill</h3> -->
            <div class="row">
                  <div class="col-md-12">
                  <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                  </div>
            </div>       
            @foreach($skills as $skill)
              @php 
                $xValues[]=$skill->name;
                $yValues[]=$skill->percent;
               
              @endphp
            @endforeach
         
        </div> 

</div> 
</div>
@endsection
@section('javascript')
$(document).ready(function() {
  var xValues=JSON.parse('{!! json_encode($xValues) !!}');
  var yValues=JSON.parse('{!! json_encode($yValues) !!}');
//bar
//var xValues = ["PHP", "JavaScript", "jQuery", "HTML", "CSS","Bootstrap","Wordpress"];
//var yValues = [65, 49, 44, 24, 50,30,10];
var barColors = ["red", "#ddff00","blue","orange","brown","pink","gray"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "PERCENTAGE OF MY SKILLS"
    },
    scales: {
      xAxes: [{ticks: {min: 10, max:100}}]
    }
  }
});
});
@endsection
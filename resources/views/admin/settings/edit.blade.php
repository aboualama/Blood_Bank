@extends('admin.inc.layouts')

@section('title')
 Edit settings

@endsection
 

@php
 
$email         = !empty($settings->email)? $settings->email : 'info@bloodbank.com' ; 
$phone         = !empty($settings->phone)? $settings->phone : '0000000000' ;  
$whatsapp      = !empty($settings->whatsapp)? $settings->whatsapp : '0000000000' ;  
$facebook_url  = !empty($settings->facebook_url)? $settings->facebook_url : 'https://www.facebook.com/' ; 
$twitter_url   = !empty($settings->twitter_url)? $settings->twitter_url : 'https://www.twitter.com/' ; 
$instagram_url = !empty($settings->instagram_url)? $settings->instagram_url : 'https://www.instagram.com/' ; 
$google_url    = !empty($settings->google_url)? $settings->google_url : 'https://www.google.com/' ; 
$youtube_url   = !empty($settings->youtube_url)? $settings->youtube_url : 'https://www.youtube.com/' ; 
$about         = !empty($settings->about)? $settings->about : 'Lorem Ipsum is simply dummy text ...' ;    

@endphp

@section('content')
 


<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit Settings

    <small>Cpanel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li> 
    <li><a href="#">Settings</a></li> 
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Edit</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover"> 


            @include('errors.error')

            {!! Form::open(['url' => url('dashboard/Settings/edit'), 'class' => 'form-group']) !!} 
                {{ method_field('PUT') }} 
                
                <div class="form-group">
                    {!! Form::label('Email') !!}
                    {!! Form::email('email', $email , ['class' => 'form-control']) !!} 
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-6">
                            {!! Form::label('Phone') !!}
                            {!! Form::text('phone', $phone , ['class' => 'form-control']) !!}
                        </div> 

                        <div class="col-lg-6">
                            {!! Form::label('Whatsapp') !!}
                            {!! Form::text('whatsapp', $whatsapp , ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="form-group"> 
                    <div class="row">
                        <div class="col-lg-6">
                            {!! Form::label('Facebook') !!}
                            {!! Form::text('facebook_url', $facebook_url , ['class' => 'form-control']) !!}
                        </div>

                        <div class="col-lg-6">
                            {!! Form::label('Twitter') !!}
                            {!! Form::text('twitter_url', $twitter_url , ['class' => 'form-control']) !!}
                        </div>

                        <div class="col-lg-6">
                            {!! Form::label('Instagram') !!}
                            {!! Form::text('instagram_url', $instagram_url , ['class' => 'form-control']) !!}
                        </div>

                        <div class="col-lg-6">
                            {!! Form::label('Google') !!}
                            {!! Form::text('google_url', $google_url , ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
 
                
                <div class="form-group">
                    {!! Form::label('Youtube') !!}
                    {!! Form::text('youtube_url', $youtube_url , ['class' => 'form-control']) !!} 
                </div>


                <div class="form-group">
                    {!! Form::label('About') !!}
                    {!! Form::textarea('about', $about , ['class' => 'form-control', 'id' => 'address']) !!}
                </div>
 
                <div class="form-group">
                    {!! Form::submit('Edit settings!', ['class' => 'form-control btn btn-block btn-success']) !!}
                </div>
                {!! Form::close() !!}
       
       </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->

 
 

@endsection 
@extends('admin.inc.layouts')

@section('title')
 Edit Contact

@endsection
 

@php
 
$email   = !empty($contact->email)? $contact->email : 'Egypt@Egypt.com' ; 
$phone   = !empty($contact->phone)? $contact->phone : '03333' ; 
$fax     = !empty($contact->fax)? $contact->fax : '033333333' ; 
$country = !empty($contact->country)? $contact->country : 'Egypt' ; 
$city    = !empty($contact->city)? $contact->city : 'Alex' ;  

 
 
$lat = !empty($contact->lat)?$contact->lat:'31.246816362820066';
$lan = !empty($contact->lan)?$contact->lan:'29.987027479681387';
$address = !empty($contact->address)?$contact->address:'Egypt';  

@endphp

@section('content')


    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map { height: 320px; margin : 20px; margin-top: 0; }
      /* Optional: Makes the sample page fill the window. */
      html, body { height: 100%;  margin: 0;  padding: 0; }

      #bodyContent{ font-size: 18px;  margin: 4px;  text-align: justify; }

    </style>


<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit Contact

    <small>Cpanel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li> 
    <li><a href="#">Contact</a></li> 
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

            {!! Form::open(['url' => 'admin/contact/edit', 'class' => 'form-group']) !!} 
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
                            {!! Form::label('Fax') !!}
                            {!! Form::text('fax', $fax , ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="form-group"> 
                    <div class="row">
                        <div class="col-lg-6">
                            {!! Form::label('Country') !!}
                            {!! Form::text('country', $country , ['class' => 'form-control']) !!}
                        </div>

                        <div class="col-lg-6">
                            {!! Form::label('City') !!}
                            {!! Form::text('city', $city , ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
 
                <div class="form-group">
                    {!! Form::label('Address') !!}
                    {!! Form::text('address', $address , ['class' => 'form-control', 'id' => 'address']) !!}
                </div>

                <div class="form-group"> 
                    <div class="row">
                        <div class="col-lg-6">
                            {!! Form::label('Lat') !!}
                            {!! Form::text('lat', $lat , ['class' => 'form-control', 'id' => 'lat']) !!}
                        </div>

                        <div class="col-lg-6">
                            {!! Form::label('Lan') !!}
                            {!! Form::text('lan', $lan , ['class' => 'form-control', 'id' => 'lan']) !!}
                        </div>
                    </div> 
                </div>

                <div class="form-group">
                    {!! Form::submit('Create New Contact!', ['class' => 'form-control btn btn-block btn-success']) !!}
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


 
<div id="map" ></div>

 

@endsection


 

 @push('js')

 <script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyBwxuW2cdXbL38w9dcPOXfGLmi1J7AVVB8'></script>
 <script type="text/javascript" src='{{ url('cpanel/dist/js/locationpicker.jquery.js') }}'></script>
 
 <script>
  $('#map').locationpicker({
      location: {
          latitude: {{ $lat }},
          longitude:{{ $lan }} 
      },
      radius: 400, 
      zoom: 15,
      markerIcon: '{{ url('cpanel/dist/img/Map-Marker.png') }}',
      inputBinding: {
        latitudeInput: $('#lat'),
        longitudeInput: $('#lan'),
       // radiusInput: $('#us2-radius'),   
        locationNameInput: $('#address')
      } 

  });
 </script>
 @endpush
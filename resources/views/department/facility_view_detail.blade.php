<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <title>View All Facility</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}" >
    <noscript><link rel="stylesheet" href="{{asset('assets/css/noscript.css')}}" /></noscript>
</head>
<body class="is-preload">
<div id="page-wrapper">
@extends('layouts.department_staff)
@section('content')
    <!-- Main -->
    <div id="main" class="wrapper style1">
        <div class="container">
            <header class="major">
                <h2>Facilities List</h2>

            </header>

            <!-- Content -->
            <section id="content">
                @if(\Session::has('success'))
                    <div class="alert alert-success">
                        <p> {{\Session::get('success')}}</p></div><br/>
                @endif
                <div class="row1">
                    <div class="col-6 col-12-xsmall">

                        <ul class="alt">
                            <table>
                                </tr>
                                <tr><td align="left">Facility ID</td><td> {{$facility->facility_id}}</td></tr>
                                <tr><td align="left">Facility Name</td><td> {{$facility->facility_name}}</td></tr>
                                <tr><td align="left">Facility Description</td><td> {{$facility->facility_desc}}</td></tr>
                                <tr><td align="left">Campus</td><td></td></tr>
                                @foreach($facilityList as $fl)
                                <tr></td>
                                    <?php $cam = \App\campus::where('campus_id',$fl->campus_id)->first();?>
                                    <td>-> {{$cam->campus_name}}</td><td></td>
                                @endforeach
                                </tr>

                                <tr>
                                    <td></td>
                                    <td align="right">
                                        <a href="{{action('facilities_listsController@edit',$facility->facility_id)}}"><input type="button" value="Modify" class="button primary"/></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href=""><input type="button" value="Cancel" onclick="window.history.go(-1); return false;"/></a>
                                    </td>

                                </tr>
                            </table>

                        </ul>
                        <!--                </xsl:if>-->

                    </div>
                </div>
            </section>

        </div>
    </div>


<!-- Scripts -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.scrolly.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.dropotron.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.scrollex.min.js')}}"></script>
<script src="{{asset('assets/js/browser.min.js')}}"></script>
<script src="{{asset('assets/js/breakpoints.min.js')}}"></script>
<script src="{{asset('assets/js/util.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>

@endsection


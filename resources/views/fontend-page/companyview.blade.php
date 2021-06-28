@extends('layouts.fontend.nav')
@section('content')
@php 
    $companyinfo=DB::table('companyinfo')
        ->orderBy('id','DESC')->limit(2)->get();

@endphp
<!-- ==================== Company Info Start =================== -->
    <section class="company_banner_section py-5 pl-5">
        <div class="container-fluid" style="margin-top:150px;">
             @foreach($companyinfo as $row)
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="company_name">
                        <h2> <span>{{ $row->name }}</span></h2>
                    </div>
                   
                    <div class="company_description pt-3">
                        <p>{!! $row->description !!}</p>
                    </div>
                     
                </div>
                <div class="col-md-6">
                    
                    <div class="company_img">
                        <img src="{{ asset($row->image) }}" alt="" class="img-responsive img-fluid">
                    </div>
                     
                </div>
            </div>
           @endforeach
        </div>
    </section>

    <section class="py-5 company_bottom pl-5 pr-5">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    @foreach($companyinfo as $row)
                    <div class="fortune_des">
                        <p>{{ $row->shortdescription }}</p>
                    </div>
                    @endforeach
                    <hr>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-3 py-2">
                    <div class="icon_body">
                        <div class="icon">
                            <h1><i class="fas fa-burn"></i></h1>
                        </div>
                        <div class="icon_info">
                            <p>Consistency</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 py-2">
                    <div class="icon_body">
                        <div class="icon">
                            <h1><i class="far fa-chart-bar"></i></h1>
                        </div>
                        <div class="icon_info">
                            <p>Improvement</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 py-2">
                    <div class="icon_body">
                        <div class="icon">
                            <h1><i class="fas fa-balance-scale"></i></h1>
                        </div>
                        <div class="icon_info">
                            <p>Good Will</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 py-2">
                    <div class="icon_body">
                        <div class="icon">
                            <h1><i class="fab fa-angellist"></i></h1>
                        </div>
                        <div class="icon_info">
                            <p>10+ Years of Experience</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
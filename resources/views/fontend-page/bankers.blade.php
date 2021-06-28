@extends('layouts.fontend.nav')
@section('content')
@php 
  $bankers=DB::table('bankers')
    ->orderBy('id','ASC')->limit(1000)->get();
    $bankerCount = $bankers->count();


    $partners=DB::table('partners')
    ->orderBy('id','ASC')->limit(1000)->get();
    $patnerCount = $partners->count();


    $settelment=DB::table('settelment')
    ->orderBy('id','ASC')->limit(1000)->get();
    $settelmentCount = $settelment->count();
    
    $insurers=DB::table('insurers')
        ->orderBy('id','ASC')->limit(1000)->get();
    $insurersCount = $insurers->count();

    $investment=DB::table('investment')
        ->orderBy('id','ASC')->limit(1000)->get();
    $investmentCount = $investment->count();

    $auditots=DB::table('auditots')
        ->orderBy('id','ASC')->limit(1000)->get();
    $auditotsCount = $auditots->count();

    $advisors=DB::table('advisors')
        ->orderBy('id','ASC')->limit(1000)->get();
    $advisorsCount = $advisors->count();

    
        

@endphp
@if($patnerCount>0)

    <section class="py-5">
        <div class="container"style="margin-top:150px;">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="company_name">
                        <h2>Our  <span>Partners</span></h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center bank_gallery pt-4">
                @foreach($partners as $row)
                <div class="col-md-2 py-0 px-0">
                    <a href="{{ asset($row->image) }}">
                        <div class="our_partner_img">
                            <img src="{{ asset($row->image) }}" alt="">
                            <div class="our_banker_overlay d-flex align-items-center">
                                <div class="zoom_icn d-flex align-items-center">
                                    <i class="fas fa-search-plus"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                
               
                
            </div>
        </div>
    </section>
    @else
    @endif




        @if($settelmentCount>0)

    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="company_name">
                        <h2>Foreign<span> Correspondend & Settelment Banks</span></h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center bank_gallery pt-4">
                @foreach($settelment as $row)
                <div class="col-md-2 py-0 px-0">
                    <a href="{{ asset($row->image) }}">
                        <div class="our_partner_img">
                            <img src="{{ asset($row->image) }}" alt="">
                            <div class="our_banker_overlay d-flex align-items-center">
                                <div class="zoom_icn d-flex align-items-center">
                                    <i class="fas fa-search-plus"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @else
    @endif

    


    @if($insurersCount>0)

    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="company_name">
                        <h2>Our<span> Insurers</span></h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center bank_gallery pt-4">
                @foreach($insurers as $row)
                <div class="col-md-2 py-0 px-0">
                    <a href="{{ asset($row->image) }}">
                        <div class="our_partner_img">
                            <img src="{{ asset($row->image) }}" alt="">
                            <div class="our_banker_overlay d-flex align-items-center">
                                <div class="zoom_icn d-flex align-items-center">
                                    <i class="fas fa-search-plus"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @else
    @endif

    

 @if($investmentCount>0)
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="company_name">
                        <h2> Our<span> Investment Bankers</span></h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center bank_gallery pt-4">
                @foreach($investment as $row)
                <div class="col-md-2 py-0 px-0">
                    <a href="{{ asset($row->image) }}">
                        <div class="our_partner_img">
                            <img src="{{ asset($row->image) }}" alt="">
                            <div class="our_banker_overlay d-flex align-items-center">
                                <div class="zoom_icn d-flex align-items-center">
                                    <i class="fas fa-search-plus"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @else
    @endif


  
   @if($auditotsCount>0)
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="company_name">
                        <h2> Our<span> Auditors </span></h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center bank_gallery pt-4">
                @foreach($auditots as $row)
                <div class="col-md-2 py-0 px-0">
                    <a href="{{ asset($row->image) }}">
                        <div class="our_partner_img">
                            <img src="{{ asset($row->image) }}" alt="">
                            <div class="our_banker_overlay d-flex align-items-center">
                                <div class="zoom_icn d-flex align-items-center">
                                    <i class="fas fa-search-plus"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @else
    @endif

    

    @if($advisorsCount>0)
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="company_name">
                        <h2> Legal<span> Advisors </span></h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center bank_gallery pt-4">
                @foreach($advisors as $row)
                <div class="col-md-2 py-0 px-0">
                    <a href="{{ asset($row->image) }}">
                        <div class="our_partner_img">
                            <img src="{{ asset($row->image) }}" alt="">
                            <div class="our_banker_overlay d-flex align-items-center">
                                <div class="zoom_icn d-flex align-items-center">
                                    <i class="fas fa-search-plus"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @else
    @endif

        @if($bankerCount>0)

    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="company_name">
                        <h2>Our  <span> Business Associates</span></h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center bank_gallery pt-4">
                @foreach($bankers as $row)
                <div class="col-md-2 py-0 px-0">
                    <a href="{{ asset($row->image) }}">
                        <div class="our_partner_img">
                            <img src="{{ asset($row->image) }}" alt="">
                            <div class="our_banker_overlay d-flex align-items-center">
                                <div class="zoom_icn d-flex align-items-center">
                                    <i class="fas fa-search-plus"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @else
    @endif
@endsection

@extends('layouts.fontend.nav')
@section('content')
@php
    $Faq=DB::table('Faq')
        ->orderBy('id','DESC')->limit(500)->get();
    
@endphp
    <section class="ls  s-py-xl-160 s-py-lg-130 s-py-md-90 s-py-60 text-sm-left text-center c-gutter-60">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <h2 class="special-heading text-sm-left text-center">
								<span class="text-capitalize">
									FAQ & Information
								</span>
                    </h2>
                    <div class="divider-50 hidden-below-lg"></div>
                    <div class="divider-30 hidden-above-lg"></div>
                    <div id="accordion01{{ $row->id ??'' }}" role="tablist">
                       
                       
                        @foreach($Faq as $row)
                                
                                <div class="card">
                                    <div class="card-header" role="tab" id="collapse02_header">
                                        <h5>
                                            <a class="collapsed" data-toggle="collapse" href="#collapse02{{ $row->id }}" aria-expanded="false" aria-controls="collapse02">
                                                {{ $row->title }}
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapse02{{ $row->id }}" class="collapse" role="tabpanel" aria-labelledby="collapse02_header" data-parent="#accordion01">
                                        <div class="card-body">
                                            {!! $row->description !!}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                        
                       
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    @endsection
<div class=" container">
    <div class="row">
        @mobile
        <div class="col-lg-3 col-6">
            <a href="{{Route('PROGRESS_STATUS','SITE SURVEY')}}" style="text-decoration:none;" class="text-dark">
                <div class="info-box mb-3">
                    <div class="info-box-content">
                        <span class="info-box-text text-center">SITE SURVEY</span>
                        <span class="info-box-number text-center">{{$site_survey}}</span>
                    </div>
                </div>
            </a>

        </div>
        @elsemobile
        <div class="col-lg-3 col-6">
            <a href="{{Route('PROGRESS_STATUS','SITE SURVEY')}}" style="text-decoration:none;" class="text-dark">
                <div class="info-box mb-3 ">
                    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-hard-hat"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">SITE SURVEY</span>
                        <span class="info-box-number">{{$site_survey}}</span>
                    </div>
                    @if (App\Alert::where('PROGRESS_STATUS','SITE SURVEY')->where("user_id",Auth::user()->id)->count() != 0)
                    <i class="fas fa-lg fa-exclamation text-danger animated infinite heartBeat"></i>
                    @endif
                </div>
            </a>
        </div>
        @endmobile

        @mobile
        <div class="col-lg-3 col-6">
            <a href="{{Route('PROGRESS_STATUS','BOQ, SITE SURVEY REPORT, DESIGN')}}" style="text-decoration:none;"
                class="text-dark">
                <div class="info-box mb-3">
                    <div class="info-box-content">
                        <span class="info-box-text text-center">BOQ & APD</span>
                        <span class="info-box-number text-center">{{$boq}}</span>
                    </div>
                </div>
            </a>
        </div>
        @elsemobile
        <div class="col-lg-3 col-6">
            <a href="{{Route('PROGRESS_STATUS','BOQ, SITE SURVEY REPORT, DESIGN')}}" style="text-decoration:none;"
                class="text-dark">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-pencil-ruler"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">BOQ & APD</span>
                        <span class="info-box-number">{{$boq}}</span>
                    </div>
                    @if (App\Alert::where('PROGRESS_STATUS','BOQ, SITE SURVEY REPORT, DESIGN')->where("user_id",Auth::user()->id)->count() != 0)
                    <i class="fas fa-lg fa-exclamation text-danger animated infinite heartBeat"></i>
                    @endif
                </div>
            </a>
        </div>
        @endmobile

        @mobile
        <div class="col-lg-3 col-6">
            <a href="{{Route('PROGRESS_STATUS','PnL PROGRESS')}}" style="text-decoration:none;" class="text-dark">
                <div class="info-box mb-3">
                    <div class="info-box-content">
                        <span class="info-box-text text-center">PnL PROGRESS</span>
                        <span class="info-box-number text-center">{{$pnl}}</span>
                    </div>
                </div>
            </a>
        </div>
        @elsemobile
        <div class="col-lg-3 col-6">
            <a href="{{Route('PROGRESS_STATUS','PnL PROGRESS')}}" style="text-decoration:none;" class="text-dark">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><img
                            src="{{ Request::is('staff') ? '' : '../' }}indonesian-rupiah.svg" alt="" srcset=""
                            width="70%"></span>
                    <div class="info-box-content">
                        <span class="info-box-text">PnL PROGRESS</span>
                        <span class="info-box-number">{{$pnl}}</span>
                    </div>
                    @if (App\Alert::where('PROGRESS_STATUS','PnL PROGRESS')->where("user_id",Auth::user()->id)->count() != 0)
                    <i class="fas fa-lg fa-exclamation text-danger animated infinite heartBeat"></i>
                    @endif
                </div>
            </a>
        </div>
        @endmobile


        @mobile
        <div class="col-lg-3 col-6">
            <a href="{{Route('PROGRESS_STATUS','NEGOTIATION 2 - PKS REVIEW')}}" style="text-decoration:none;"
                class="text-dark">
                <div class="info-box mb-3">
                    <div class="info-box-content">
                        <span class="info-box-text text-center">PKS REVIEW</span>
                        <span class="info-box-number text-center">{{$pks_review}}</span>
                    </div>
                </div>
            </a>
        </div>
        @elsemobile
        <div class="col-lg-3 col-6">
            <a href="{{Route('PROGRESS_STATUS','NEGOTIATION 2 - PKS REVIEW')}}" style="text-decoration:none;"
                class="text-dark">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-maroon elevation-1"><i class="fas fa-balance-scale"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">PKS REVIEW</span>
                        <span class="info-box-number">{{$pks_review}}</span>
                    </div>
                    @if (App\Alert::where('PROGRESS_STATUS','NEGOTIATION 2 - PKS REVIEW')->where("user_id",Auth::user()->id)->count() != 0)
                    <i class="fas fa-lg fa-exclamation text-danger animated infinite heartBeat"></i>
                    @endif
                </div>
            </a>
        </div>
        @endmobile
        @mobile
        <div class="col-lg-3 col-6">
            <a href="{{Route('PROGRESS_STATUS','SIGNED PKS')}}" style="text-decoration:none;" class="text-dark">
                <div class="info-box mb-3">
                    <div class="info-box-content">
                        <span class="info-box-text text-center">SIGNED PKS</span>
                        <span class="info-box-number text-center">{{$Sign_pks}}</span>
                    </div>
                </div>
            </a>
        </div>
        @elsemobile
        <div class="col-lg-3 col-6">
            <a href="{{Route('PROGRESS_STATUS','SIGNED PKS')}}" style="text-decoration:none;" class="text-dark">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-navy elevation-1"><i class="fas fa-handshake"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">SIGNED PKS</span>
                        <span class="info-box-number">{{$Sign_pks}}</span>
                    </div>
                    @if (App\Alert::where('PROGRESS_STATUS','SIGNED PKS')->where("user_id",Auth::user()->id)->count() != 0)
                    <i class="fas fa-lg fa-exclamation text-danger animated infinite heartBeat"></i>
                    @endif
                </div>
            </a>
        </div>
        @endmobile

        @mobile
        <div class="col-lg-3 col-6">
            <a href="{{Route('PROGRESS_STATUS','ROLL-OUT PROGRESS')}}" style="text-decoration:none;" class="text-dark">
                <div class="info-box mb-3">
                    <div class="info-box-content">
                        <span class="info-box-text text-center">ROLL-OUT</span>
                        <span class="info-box-number text-center">{{$roll}}</span>
                    </div>
                </div>
            </a>
        </div>
        @elsemobile
        <div class="col-lg-3 col-6">
            <a href="{{Route('PROGRESS_STATUS','ROLL-OUT PROGRESS')}}" style="text-decoration:none;" class="text-dark">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-orange elevation-1"><i class="fas fa-tools"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">ROLL-OUT</span>
                        <span class="info-box-number">{{$roll}}</span>
                    </div>
                    @if (App\Alert::where('PROGRESS_STATUS','ROLL-OUT PROGRESS')->where("user_id",Auth::user()->id)->count() != 0)
                    <i class="fas fa-lg fa-exclamation text-danger animated infinite heartBeat"></i>
                    @endif
                </div>
            </a>
        </div>
        @endmobile
        @mobile
        <div class="col-lg-3 col-6">
            <a href="{{Route('PROGRESS_STATUS','READY TO SELL')}}" style="text-decoration:none;" class="text-dark">
                <div class="info-box mb-3">
                    <div class="info-box-content">
                        <span class="info-box-text text-center">READY TO SELL</span>
                        <span class="info-box-number text-center">{{$sell}}</span>
                    </div>
                </div>
            </a>
        </div>
        @elsemobile
        <div class="col-lg-3 col-6">
            <a href="{{Route('PROGRESS_STATUS','READY TO SELL')}}" style="text-decoration:none;" class="text-dark">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-lime elevation-1"><i class="fas fa-check"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">READY TO SELL</span>
                        <span class="info-box-number">{{$sell}}</span>
                    </div>
                    @if (App\Alert::where('PROGRESS_STATUS','READY TO SELL')->where("user_id",Auth::user()->id)->count() != 0)
                    <i class="fas fa-lg fa-exclamation text-danger animated infinite heartBeat"></i>
                    @endif
                </div>
            </a>
        </div>
        @endmobile
        @mobile
        <div class="col-lg-3 col-6">
            <a href="{{Route('PROGRESS_STATUS','REJECT')}}" style="text-decoration:none;" class="text-dark">
                <div class="info-box mb-3">
                    <div class="info-box-content">
                        <span class="info-box-text text-center">REJECT</span>
                        <span class="info-box-number text-center">{{$reject}}</span>
                    </div>
                </div>
            </a>
        </div>
        @elsemobile
        <div class="col-lg-3 col-6">
            <a href="{{Route('PROGRESS_STATUS','REJECT')}}" style="text-decoration:none;" class="text-dark">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-times"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">REJECT</span>
                        <span class="info-box-number">{{$reject}}</span>
                    </div>
                </div>
            </a>
        </div>
        @endmobile

    </div>
</div>

{{-- <staff-input id="100" nama="{{session('id')}}" /> --}}
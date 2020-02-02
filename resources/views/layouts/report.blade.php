<div class="row justify-content-center">
    <div class="col-md-12 col-lg-5 py-2 col-sm-12 text-center">

    	@auth
    		@if ( !auth()->user()->hasVerifiedEmail() ) 
		        @alert(['type' => 'danger'])
		            {{ "Thanks for joining Connection Coin! Be sure to verify your email to activate your account! (You may need to check your spam folder!)" }}
		        @endalert
		    @endif
	    @endauth

    	<div class="panel shadow text-center">
    		<div class="card h-100 shadow">
    			<div class="card-body d-none d-sm-block">
    				{{-- <h1> World's Most Recent Connections</h1> --}}

    				<div class="row text-center">
				        <div class="col-md-6 col-sm-6">
				            <div class="progress blue">
				                <span class="progress-left">
				                    <span class="progress-bar"></span>
				                </span>
				                <span class="progress-right">
				                    <span class="progress-bar"></span>
				                </span>
				                <div class="progress-value">{{ $circulation }}</div>
				            </div>
				            <span> COINS IN CIRCULATION</span>
				        </div>
				        <div class="col-md-6 col-sm-6">
				            <div class="progress blue">
				                <span class="progress-left">
				                    <span class="progress-bar"></span>
				                </span>
				                <span class="progress-right">
				                    <span class="progress-bar"></span>
				                </span>
				                <div class="progress-value">{{ $connections }}</div>
				            </div>
				            <span class="text-center"> CONNECTIONS MADE</span>
				        </div>
				    </div>
    			</div>

    			<div class="d-block d-sm-none mt-3 text-center">
    				{{-- <h1> World's Most Recent Connections</h1> --}}

    				<div class="row">
				        <div style="margin-left: 18%;">
				            <div class="progress blue" style="width: 100px; height: 100px;">
				                <span class="progress-left" style="width: 49%;">
				                    <span class="progress-bar"></span>
				                </span>
				                <span class="progress-right" style="width: 49%;">
				                    <span class="progress-bar"></span>
				                </span>
				                <div class="progress-value" style="line-height: 95px;">{{ $circulation }}</div>
				            </div>
				            <span style="font-size: 10px;"> COINS IN CIRCULATION</span>
				        </div>
				        <div style="margin-left: 9%;">
				            <div class="progress blue" style="width: 100px; height: 100px;">
				                <span class="progress-left" style="width: 49%;">
				                    <span class="progress-bar"></span>
				                </span>
				                <span class="progress-right" style="width: 49%;">
				                    <span class="progress-bar"></span>
				                </span>
				                <div class="progress-value" style="line-height: 95px;">{{ $connections }}</div>
				            </div>
				            <span style="font-size: 10px;"> CONNECTIONS MADE</span>
				        </div>
				    </div>
    			</div>
    		</div>
    	</div>
    </div>
</div>
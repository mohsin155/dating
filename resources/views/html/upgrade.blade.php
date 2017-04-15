@extends('layouts.main')
@section('content')
<div class="content-wrapper-inner">
    <div class="content-wrapper-settings">
     <form name="" class="form-inline" id="" novalidate="novalidate">
         <div class="upgrade-top-section">
        <div class="steps">
		<span class="step">
			<div class="circle">3</div>
			<div class="vertical-table">
				<p>Receipt</p>
			</div>
		</span>
		<div class="rightarrow"></div>
		<span class="step">
			<div class="circle">2</div>
			<div class="vertical-table">
				<p>Personal Details</p>
			</div>
		</span>
		<div class="rightarrow"></div>
		<span class="step">
			<div class="circle selected">1</div>
			<div class="vertical-table">
				<p>Choose Membership</p>
			</div>
		</span>
	</div>

    </div>
         <div class="col-md-12 banner-section pd-t-20">
             <img src="../image/banner.png" alt="banner image" width="770">
         </div>
             </form>
    </div>
</div>
@endsection
@extends('layouts.main')
@section('content')
<div class="content-wrapper-inner">
    <div class="content-wrapper-settings">
        <form name="subscription" class="form-inline" id="" method="post" action="{{url('payment/order')}}" novalidate="novalidate">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
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
            <div class="subscription">
                <div class="subscription-header">
                    <h2>Step 1 - Choose a subscription</h2>
                    <a href="#upgrade" title="Compare Membership Features">Why Choose Platinum Membership »</a>
                    <div class="clearfix"></div>
                </div>
                <ul class="tab">

                    <li><a href="javascript:void(0)" class="tablinks platinum active text-center">Platinum</a></li>
                    <li><a href="javascript:void(0)" class="tablinks gold text-center">Gold</a></li>
                </ul>
                <input type="hidden" value="2" name="package" />
                <div class="platinum-section tab-content">
                    <?php $i=0;?>
                    @foreach($pricing as $price)
                    
                    @if($price->subscription_type==2)
                    <?php $i++; ?>
                    <div class="col-md-12 pd-0">
                        <div class="col-md-3 tab-color">
                            <span>{{$price->duration}} Months</span>
                        </div>
                        <div class="col-md-9">
                            <div class="col-md-1 pd-t-10">
                                <input type="radio" name="platimun" value="{{$price->pricing_id}}" {{$i==1?'checked':''}}>
                            </div>
                            <div class="col-md-8">
                                <strong>
                                    <span>  
                                        $ {{$price->monthly_price}} USD
                                    </span>
                                    <span class="month">
                                        per month
                                    </span>
                                </strong>
                                <div class="inner-text">
                                    Billed in one payment of 
                                    <span > $ {{$price->amount}} USD</span>
                                </div>
                            </div>
                            <div class="col-md-3 pd-0">
                                <button class="btn btn-primary btn-purple" type="submit">SAVE 64%</button>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    
                </div>
                <div class="gold-section tab-content hide">
                    <?php $i=0;?>
                    @foreach($pricing as $price)
                    
                    @if($price->subscription_type==1)
                    <?php $i++; ?>
                    <div class="col-md-12 pd-0">
                        <div class="col-md-3 tab-color">
                            <span>{{$price->duration}} Months</span>
                        </div>
                        <div class="col-md-9">
                            <div class="col-md-1 pd-t-10">
                                <input type="radio" name="gold" value="{{$price->pricing_id}}" {{$i==1?'checked':''}}>
                            </div>
                            <div class="col-md-8">
                                <strong>
                                    <span>  
                                        $ {{$price->monthly_price}} USD
                                    </span>
                                    <span class="month">
                                        per month
                                    </span>
                                </strong>
                                <div class="inner-text">
                                    Billed in one payment of 
                                    <span > $ {{$price->amount}} USD</span>
                                </div>
                            </div>
                            <div class="col-md-3 pd-0">
                                <button class="btn btn-primary btn-purple" type="submit">SAVE 64%</button>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="payment-method">
                <div class="payment-header">
                    <h2>Step 2 - Choose a payment method</h2>

                </div>
                <div class="col-md-12">

                    <!--<div class="col-md-6 pd-t-20 pd-l-0">
                        <div class="col-md-2 pd-0">
                            <input type="radio" name="paymentMethod" class="changeCurrency"  checked="checked" value="1">
                        </div>
                        <div class="col-md-4 pd-0 payment-text">
                            <label for="credit">Credit Card</label>
                        </div>
                        <div class="col-md-4">
                            <div class="recommend">Recommended</div>
                        </div>
                        <div class="col-md-2">
                            <img id="displayProfileToolTip" alt="info" src="{{url('image/info.png')}}" class="pd-l-5">
                        </div>

                    </div>-->
                    <div class="col-md-6 pd-t-20 pd-l-0">
                        <div class="col-md-2 pd-0">
                            <input type="radio" name="payment_method" class="changeCurrency" value="paypal">
                        </div>
                        <div class="col-md-4 pd-0 payment-text">
                            <label for="credit">PayPal</label>
                        </div>
                        <div class="col-md-4">
                            <div class="recommend"></div>
                        </div>
                        <div class="col-md-2">
                            <img id="displayProfileToolTip" alt="info" src="{{url('image/info.png')}}" class="pd-l-5">
                        </div>

                    </div>
                </div>
                <!--<div class="col-md-12 mr-b-20">

                    <div class="col-md-6 pd-t-10 pd-l-0">
                        <div class="col-md-2 pd-0">
                            <input type="radio" name="paymentMethod" class="changeCurrency" >
                        </div>
                        <div class="col-md-4 pd-0 payment-text">
                            <label for="credit">Bank Transfer</label>
                        </div>
                        <div class="col-md-4">
                            <div class="recommend"></div>
                        </div>
                        <div class="col-md-2">
                            <img id="displayProfileToolTip" alt="info" src="{{url('image/info.png')}}" class="pd-l-5">
                        </div>

                    </div>-->
                    <!--<div class="col-md-6 pd-t-10 pd-l-0">
                        <div class="col-md-2 pd-0">
                            <input type="radio" name="paymentMethod" class="changeCurrency">
                        </div>
                        <div class="col-md-4 pd-0 payment-text">
                            <label for="credit">paysafecard</label>
                        </div>
                        <div class="col-md-4">
                            <div class="recommend"></div>
                        </div>
                        <div class="col-md-2">
                            <img id="displayProfileToolTip" alt="info" src="{{url('image/info.png')}}" class="pd-l-5">
                        </div>

                    </div>-->
                </div>
                <div class="button-inner text-center center-block">
                    <button class="btn btn-primary btn-green" type="submit">Upgrade Now</button>
                </div>
                <div class="text-center subscription-text">
                    This subscription will be automatically renewed once it expires. This will ensure continuous access to all the benefits of a premium membership so you can enjoy uninterrupted communications with all your potential matches. You can opt out of auto renewal at any time. <a href="#"  data-toggle="modal" data-target="#subscription-reniew">Learn more</a>
                </div>
            </div>
            <div class="pd-10">
                <span class="paymenticons">
                    <img src="{{url('image/1.gif')}}" width="60" height="36" hspace="5" vspace="10"><img src="{{url('image/111.gif')}}" width="60" height="36" hspace="5" vspace="10"><img src="{{url('image/122.gif')}}" width="60" height="36" hspace="5" vspace="10"><img src="{{url('image/3.gif')}}" width="60" height="36" hspace="5" vspace="10"><img src="{{url('image/2.gif')}}" width="60" height="36" hspace="5" vspace="10"><img src="{{url('image/128.gif')}}" width="60" height="36" hspace="5" vspace="10"><img src="{{url('image/132.gif')}}" width="60" height="36" hspace="5" vspace="10"><img src="{{url('image/830.gif')}}" width="60" height="36" hspace="5" vspace="10"><img src="{{url('image/1000.gif')}}" width="60" height="36" hspace="5" vspace="10">
                </span>
                <div class="securityicons">

                    <!-- START Thawte image -->
                    <div class="thawte"><script type="text/javascript" src="https://seal.thawte.com/getthawteseal?host_name=www.LatinAmericanCupid.com&amp;size=L&amp;lang=en"></script><a href="https://sealinfo.thawte.com/thawtesplash?form_file=fdf/thawtesplash.fdf&amp;dn=WWW.LATINAMERICANCUPID.COM&amp;lang=en" tabindex="-1" onmousedown="return v_mDown(event);" target="THAWTE_Splash"><img name="seal" border="true" src="https://seal.thawte.com/getthawteseal?at=0&amp;sealid=1&amp;dn=WWW.LATINAMERICANCUPID.COM&amp;lang=en&amp;gmtoff=-330" oncontextmenu="return false;" alt="Click to Verify - This site has chosen a thawte SSL Certificate to improve Web site security"></a></div>
                    <!-- END Thawth CODE -->
                    <!-- START SCANALERT CODE -->
                    <div class="right"><a target="_blank" href="https://www.scanalert.com/RatingVerify?ref=www.LatinAmericanCupid.com"><img width="94" height="54" border="0" src="//images.scanalert.com/meter/www.LatinAmericanCupid.com/13.gif" alt="HACKER SAFE certified sites prevent over 99.9% of hacker crime." oncontextmenu="alert('Copying Prohibited by Law - HACKER SAFE is a Trademark of ScanAlert'); return false;" class="right"></a></div>
                    <!-- END SCANALERT CODE -->

                </div>
                <div class="clear"></div>
            </div>
            <div class="clearfix"></div>
            <a id="upgrade"></a>
            <div class="payment-method">
                <div class="payment-header">
                    <h2>Compare Membership Features</h2>
                    <div class="clear"></div>
                </div>
                <table class="bordered2">
                    <colgroup>
                        <col>
                        <col class="standardBackground2">
                        <col class="goldBackground2">
                        <col class="platinumBackground2">
                    </colgroup>
                    <thead>
                        <tr>
                            <th width="52%" align="left" class="features">Features</th>
                            <th width="16%" align="center" class="text-center">Standard</th>        
                            <th width="16%" align="center" class="text-center">Gold</th>
                            <th width="16%" align="center" class="text-center">Platinum</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($features as $feature)
                        <tr>
                            <td class="features">{{$feature->name}}</td>
                            <td align="center"><img width="20" height="20" src="{{$feature->standard?url('image/greentick.png'):url('image/cross.png')}}"></td>      
                            <td align="center"><img width="20" height="20" src="{{$feature->gold?url('image/greentick.png'):url('image/cross.png')}}"></td>
                            <td align="center"><img width="20" height="20" src="{{$feature->platinum?url('image/greentick.png'):url('image/cross.png')}}"></td>
                        </tr>
                        @endforeach
                        

                    </tbody>
                </table>
            </div>
            </form>
    </div>
</div>
<div id="subscription-reniew" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Automatic Renewal</h4>
      </div>
      <div class="modal-body">
          <p><strong>Automatic Renewal - Continuous Service</strong><br>
          There is nothing worse than losing touch with a potential match when all you want to do is continue your conversation! To avoid this interruption, your membership on LatinAmericanCupid.com will be automatically renewed. After your initial membership period expires, your membership will be automatically renewed for an additional equivalent period, at the same price. Your credit/debit card will be automatically charged.</p>
          <p><strong>Billing Details</strong><br>
          The charge on your billing statement or card will appear as "LatinAmericanCupid.com Southport AU". You are being billed by Cupid Media Pty Ltd, Suite 2502, 5 Lawson Street, Southport, QLD 4215, Australia. Your billing currency is USD.
          </p>
          <p><strong>Cancel Any Time</strong><br>
          We don't want to interrupt your conversations so we offer a continuous service. However, if you want to discontinue the service, you can opt out of auto renewal at any time. Simply select 'Billing' from the Settings menu to change your billing preferences.
          </p>
          <p><strong>Customer Service</strong><br>
              Need more help or information? Feel free to contact our customer service team at<br>team@LatinAmericanCupid.com.
          </p>
      </div>

    </div>

  </div>
</div>
@section('script')
<script>
    $(document).ready(function(){
        $(".tablinks").on("click",function(){
            if($(this).hasClass('platinum')){
                $("input[name=package]").val(2);
            }else{
                $("input[name=package]").val(1);
            }
        })
    });
</script>
@endsection('script')
@endsection
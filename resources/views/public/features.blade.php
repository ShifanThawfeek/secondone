@extends('layouts.public')

@section('content')
<!-- First Feature -->
<div class="container-fluid hero">
  <div class="container">
    <div class="row">
      <div class="col-md-6" style="display: flex;justify-content: center">
        <img src="{{ url('assets/images/ta.png') }}" class="img-fluid feature-image" alt="Mata on me">
      </div>
      <div class="col-md-6 my-auto">
        <p class="feature-text">Combine scattered information into one</p>
        <p class="text-muted h4">
          Display multiple links and accounts <br> at once on {{ $website->name }}
        </p>
        <!-- <a href="{{ route('register') }}" class="btn btn-login" type="submit">Try for FREE</a> -->
      </div>
    </div>
  </div>
</div>
<!-- / First Feature -->

<!--<hr>-->
<!-- Second Feature -->
<div class="container-fluid hero">
  <div class="container">
    <div class="row">
      <div class="col-md-6" style="display: flex;justify-content: center">
        <img src="{{ url('assets/images/feature-1.png') }}" class="img-fluid feature-image" alt="Mata on me">
      </div>
      <div class="col-md-6 my-auto">
        <p class="feature-text">Connected anytime anywhere</p>
        <p class="text-muted h4">
          From website, social accounts to blog posts. All eyes on you in one landing page!
        </p>
        <!-- <a href="{{ route('register') }}" class="btn btn-login" type="submit">Try for FREE</a> -->
      </div>
    </div>
  </div>
</div>
<!-- / Second Feature -->

<!--<hr>-->
<!-- Third Feature -->
<div class="container-fluid hero">
  <div class="container">
    <div class="row">
      <div class="col-md-6" style="display: flex;justify-content: center">
        <img src="{{ url('assets/images/feature-3.png') }}" class="img-fluid feature-image" alt="Mata on me">
      </div>
      <div class="col-md-6 my-auto">
        <p class="feature-text">Simple usage</p>
        <p class="text-muted h4">
          An easy-to-use screen that can be registered in 5 minutes.
          In the professional version, access analysis such as the
          number of visits for each link is possible
        </p>
        <!-- <a href="{{ route('register') }}" class="btn btn-login" type="submit">Try for FREE</a> -->
      </div>
    </div>
  </div>
</div>
<!-- / Third Feature -->

<!--<hr>-->

<!-- Pricing -->
<!-- <div class="container-fluid padded" id="pricing">
        <div class="container">
            <p class="text-center feature-text">Monthly subcription plan</p>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header h2 text-center main-color">FREE</div>
                        <div class="card-body">
                            <p class="h1 text-center main-color">RM 0.00<span style="font-size: 18px;">/ Month</span></p>
                            <p class="h4"><i class="fa fa-check main-color"></i> Page creation</p>
                            <p class="h4"><i class="fa fa-check main-color"></i> Change profile picture</p>
                            <p class="h4"><i class="fa fa-check main-color"></i> Creating a Bio (introduction)</p>
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('register') }}" class="btn btn-login w-100">GET STARTED</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header h2 text-center main-color">PREMIUM</div>
                        <div class="card-body">
                            <p class="h1 text-center main-color">RM 18.00<span style="font-size: 18px;">/ Month</span></p>
                            <p class="h4"><i class="fa fa-check main-color"></i> Page creation</p>
                            <p class="h4"><i class="fa fa-check main-color"></i> Change profile picture</p>
                            <p class="h4"><i class="fa fa-check main-color"></i> Creating a Bio (introduction)</p>
                            <p class="h4"><i class="fa fa-check main-color"></i> Access analysis</p>
                            <p class="h4"><i class="fa fa-check main-color"></i> Background customization</p>
                            <p class="h4"><i class="fa fa-check main-color"></i> Customize social icons</p>
                            <p class="h4"><i class="fa fa-check main-color"></i> Change of shades</p>
                            <p class="h4"><i class="fa fa-check main-color"></i> Button customization</p>
                        </div>
                        <div class="card-footer">
                            @guest
                            <a href="{{ route('upgrade') }}" class="btn btn-login w-100">GET STARTED</a>
                            @endguest
                            @auth
                            <a href="{{ route('upgrade') }}" class="btn btn-login w-100">GO PRO</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

<!-- / Pricing -->
<hr class="my-5" id="pricing">
<!-- Students Benefit Program -->
<!--     <div class="container-fluid">
        <div class="container">
            <p class="h1 text-center main-color mb-5">Student Benefit Program</p>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header h2 text-center main-color">Student Pricing</div>
                        <div class="card-body">
                            <p class="h1 text-center main-color mb-0 pb-0">RM 9.90<span style="font-size: 18px;">/ Month</span></p>
                            <p class="text-center mt-0 pt-0">
                                <del class="text-center text-muted">RM 18.00<span style="font-size: 18px;">/ Month</span></del>
                            </p>
                            <p class="h4"><i class="fa fa-check main-color"></i> Page creation</p>
                            <p class="h4"><i class="fa fa-check main-color"></i> Change profile picture</p>
                            <p class="h4"><i class="fa fa-check main-color"></i> Creating a Bio (introduction)</p>
                            <p class="h4"><i class="fa fa-check main-color"></i> Access analysis</p>
                            <p class="h4"><i class="fa fa-check main-color"></i> Background customization</p>
                            <p class="h4"><i class="fa fa-check main-color"></i> Customize social icons</p>
                            <p class="h4"><i class="fa fa-check main-color"></i> Change of shades</p>
                            <p class="h4"><i class="fa fa-check main-color"></i> Button customization</p>
                        </div>
                        <div class="card-footer">
                            @guest
                            <a href="{{ route('upgrade', ['type' => 'student']) }}" class="btn btn-login w-100">GET STARTED</a>
                            @endguest
                            @auth
                            <a href="{{ route('upgrade', ['type' => 'student']) }}" class="btn btn-login w-100">GO PRO</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->






<div class="container">

  <div class="title-tag-line"><b></b><span>Monthly subscription plan</span><b></b><a href="#targetDiv" class="topic-price">I'm a Student!</a></div>
  <div class="table-wrap tb-price">
    <table class="table table-striped">
      <!-- <thead>
          <tr>
            <th></th>
            <th>Pro version</br>RM 18.00 / Month</th>
            <th>Free version</br>RM 00 / Month</th>
          </tr>
        </thead> -->
      <tbody>
        <tr>
          <td></td>
          <td class="col-tb-sec"><b>Pro version</b></br>RM 18.00 / Month</td>
          <td class="col-tb-sec"><b>Free version</b></br>RM 00 / Month</td>
        </tr>
        <tr>
          <td>Page creation</td>
          <td class="col-tb-sec"><img src="{{ url('assets/images/selected-price.png') }}" width="26" height="26"></td>
          <td class="col-tb-sec"><img src="{{ url('assets/images/selected-price.png') }}" width="26" height="26"></td>
        </tr>

        <tr>
          <td>Change profile picture</td>
          <td class="col-tb-sec"><img src="{{ url('assets/images/selected-price.png') }}" width="26" height="26"></td>
          <td class="col-tb-sec"><img src="{{ url('assets/images/selected-price.png') }}" width="26" height="26"></td>
        </tr>

        <tr>
          <td>Creating a Bio (introduction)</td>
          <td class="col-tb-sec"><img src="{{ url('assets/images/selected-price.png') }}" width="26" height="26"></td>
          <td class="col-tb-sec"><img src="{{ url('assets/images/selected-price.png') }}" width="26" height="26"></td>
        </tr>

        <tr>
          <td>Access analysis</td>
          <td class="col-tb-sec"><img src="{{ url('assets/images/selected-price.png') }}" width="26" height="26"></td>
          <td class="col-tb-sec"></td>
        </tr>

        <tr>
          <td>Background customization</td>
          <td class="col-tb-sec"><img src="{{ url('assets/images/selected-price.png') }}" width="26" height="26"></td>
          <td class="col-tb-sec"></td>
        </tr>

        <tr>
          <td>Customize social icons</td>
          <td class="col-tb-sec"><img src="{{ url('assets/images/selected-price.png') }}" width="26" height="26"></td>
          <td class="col-tb-sec"></td>
        </tr>

        <tr>
          <td>Change of shades</td>
          <td class="col-tb-sec"><img src="{{ url('assets/images/selected-price.png') }}" width="26" height="26"></td>
          <td class="col-tb-sec"></td>
        </tr>

        <tr>
          <td>Button customization</td>
          <td class="col-tb-sec"><img src="{{ url('assets/images/selected-price.png') }}" width="26" height="26"></td>
          <td class="col-tb-sec"></td>
        </tr>


        <!-- <tr>
          <td class="col-tb-sec col-xs-12 col-md-12">
            <div class="hide">
              @guest
              <a href="{{ route('upgrade') }}" class="btn btn-danger btn-lg btn-block">
                <w>Subscribe Now</w>
              </a>
              @endguest
              @auth
              <a href="{{ route('upgrade') }}" class="btn btn-danger btn-block col-xs-12 col-md-12">
                <w>GO PRO</w>
              </a>
              @endauth
            </div>
          </td>
          <td class="col-tb-sec">
            <div class="hide">
              <a href="{{ route('register') }}" class="btn btn-danger btn-block col-xs-12 col-md-8">
                <w>Free sign upz</w>
              </a>
            </div>
          </td>
        </tr> -->
      </tbody>
    </table>

    <div>
      <div class="btn col-md-6" style="margin:-5px">&nbsp;</div>
      <div class="btn btn-danger custom-button col-md-3">
        @guest
        <a href="{{ route('upgrade') }}" class="btn btn-danger btn-block ">
          Subscribe Now
        </a>
        @endguest
        @auth
        <a href="{{ route('upgrade') }}" class="btn btn-danger btn-block">
          GO PRO
        </a>
        @endauth
      </div>
      <div class="btn btn-danger custom-button col-md-3">
        <a href="{{ route('register') }}" class="btn btn-danger btn-block">
          Free sign up
        </a>
      </div>
    </div>
  </div>


  <div id="targetDiv"></div>
  <div class="title-tag-line"><b></b><span>Student Benefit Program</span><b></b></div>

  <!-- <div class="col-md-12">
  <h1>Student Benefit Program</h1>
  </div> -->


  <div class="table-wrap tb-price">
    <table class="table table-striped">
      <!-- <thead>
          <tr>
            <th></th>
            <th>Pro version</br>RM 18.00 / Month</th>
            <th>Free version</br>RM 00 / Month</th>
          </tr>
        </thead> -->
      <tbody>
        <tr>
          <td></td>
          <td class="col-tb-only sale_month"><b>RM9.90</b></br> / Month</br><span>RM 18.00 / Month</span></td>
        </tr>
        <tr>
          <td>Page creation</td>
          <td class="col-tb-only"><img src="{{ url('assets/images/selected-price.png') }}" width="26" height="26"></td>
        </tr>

        <tr>
          <td>Change profile picture</td>
          <td class="col-tb-only"><img src="{{ url('assets/images/selected-price.png') }}" width="26" height="26"></td>
        </tr>

        <tr>
          <td>Creating a Bio (introduction)</td>
          <td class="col-tb-only"><img src="{{ url('assets/images/selected-price.png') }}" width="26" height="26"></td>
        </tr>

        <tr>
          <td>Access analysis</td>
          <td class="col-tb-only"><img src="{{ url('assets/images/selected-price.png') }}" width="26" height="26"></td>
        </tr>

        <tr>
          <td>Background customization</td>
          <td class="col-tb-only"><img src="{{ url('assets/images/selected-price.png') }}" width="26" height="26"></td>
        </tr>

        <tr>
          <td>Customize social icons</td>
          <td class="col-tb-only"><img src="{{ url('assets/images/selected-price.png') }}" width="26" height="26"></td>
        </tr>

        <tr>
          <td>Change of shades</td>
          <td class="col-tb-only"><img src="{{ url('assets/images/selected-price.png') }}" width="26" height="26"></td>
        </tr>

        <tr>
          <td>Button customization</td>
          <td class="col-tb-only"><img src="{{ url('assets/images/selected-price.png') }}" width="26" height="26"></td>
        </tr>

        <!-- <tr>
          <td></td>
          <td class="col-tb-sec">
            @guest
            <a href="{{ route('about', ['type' => 'student']) }}" class="btn btn-danger btn-lg">Subscribe Now</a>
            @endguest
            @auth
            <a href="{{ route('about', ['type' => 'student']) }}" class="btn btn-danger btn-lg">GO PRO</a>
            @endauth
          </td>
        </tr> -->

      </tbody>
    </table>
  </div>

  <div class="btn col-md-7" style="margin:-30px">&nbsp;</div>
  <div class="btn btn-danger custom-button col-md-3">
    @guest
    <a href="{{ route('about', ['type' => 'student']) }}" class="btn btn-danger">Subscribe Now</a>
    @endguest
    @auth
    <a href="{{ route('about', ['type' => 'student']) }}" class="btn btn-danger">GO PRO</a>
    @endauth
  </div>

</div>


<!-- / Students Benefit Program -->
@endsection
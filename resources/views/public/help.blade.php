@extends('layouts.public')

@section('content')
<div class="container-fluid hero">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="display: flex; justify-content: center">
        <p class="howcan" style="font-weight: bold; font-size: 50px; margin-top: 0px">How can we help you today?</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="display: flex; justify-content: center">
        <div class="form-outline">
          <form class="form-inline my-2 my-lg-0">
            <div class="" style="display: flex; justify-content: center">
              <input class="form-control mr-sm-2" type="search" style="background: white; display: flex; justify-content: center" placeholder="" aria-label="Search">
              <button class="btn btn-outline-success mr-sm-2 btn-lg text-white" type="submit" style="background: #3abc3a; border-radius: 18px;">
                search
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>

  <!-- images Solution Contact Us FAQ-->
  <div class="row">
    <!-- <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3" style="display: flex; justify-content: center; margin-top: 50px; margin-bottom: 50px"> -->
    <div class="col-md-3" style="display: flex; justify-content: center; margin-top: 50px; margin-bottom: 50px">
    </div>

    <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2" style="display: flex; justify-content: center; margin-top: 50px; margin-bottom: 50px">
      <table class="table">
        <tbody>
          <tr >
            <td style="text-align: center;">
              <img style="width: 80px;  " src="{{ url('assets/images/icons/lightbulb.svg') }}" class="img-fluid feature-image" alt="Solution">
              <p style="text-align: center;">Solution</p>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2" style="display: flex; justify-content: center; margin-top: 50px; margin-bottom: 50px">
      <table class="table">
        <tbody>
          <tr>
            <td style="text-align: center;">
              <img style="width: 80px;  " src="{{ url('assets/images/icons/mail.svg') }}" class="img-fluid feature-image" alt="Contact Us">
              <p style="text-align: center;">Contact Us</p>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2" style="display: flex; justify-content: center; margin-top: 50px; margin-bottom: 50px">
      <table class="table">
        <tbody>
          <tr>
            <td style="text-align: center;">
              <img style="width: 80px;  " src="{{ url('assets/images/icons/faqs.svg') }}" class="img-fluid feature-image" alt="FAQ">
              <p style="text-align: center;">FAQ</p>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3" style="display: flex; justify-content: center; margin-top: 50px; margin-bottom: 50px">
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="display: flex; justify-content: center; margin-top: 30px; margin-bottom: 50px">
      <p style="font-weight: bold; font-size: 35px">How It Works?</p>
    </div>
  </div>

  <!-- <div class="row"> -->
  <div class="row text-center d-flex justify-content-center pt-5 mb-3">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="display: flex; justify-content: center">
      <div class="form-outline">
        <form class="form-inline my-2 my-lg-0">
          <div>
            <button class="btn btn-outline-success my-2 my-sm-0 btn-lg text-white" type="submit" style="background: #3D1BFF; border-radius: 18px; width: 190px; height: 110px">
            <a href="/getting_started" style="color: #40FF99 ;">Getting Started with Moja.link</a> 
            </button>
            &nbsp;&nbsp;&nbsp;
            <button class="btn btn-outline-success my-2 my-sm-0 btn-lg text-white" type="submit" style="background: #3D1BFF; border-radius: 18px; width: 190px; height: 110px">
              <p style="color: #40FF99;">Our Features</p>
            </button>
            &nbsp;&nbsp;&nbsp;
            <button class="btn btn-outline-success my-2 my-sm-0 btn-lg text-white" type="submit" style="background: #3D1BFF; border-radius: 18px; width: 190px; height: 110px">
              <p style="color: #40FF99;">Billing & Security</p>
            </button>
            &nbsp;&nbsp;&nbsp;
            <button class="btn btn-outline-success my-2 my-sm-0 btn-lg text-white" type="submit" style="background: #3D1BFF; border-radius: 18px; width: 190px; height: 110px">
              <p style="color: #40FF99;">FAQs</p>
            </button>
            &nbsp;&nbsp;&nbsp;
        </form>
      </div>
    </div>
  </div>
</div>
</div>

@endsection
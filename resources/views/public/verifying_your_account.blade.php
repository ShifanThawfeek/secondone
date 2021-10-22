@extends('layouts.public')

@section('content')

<div class="container-fluid hero">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p style="font-weight:bold; font-size: 35px;">Verifying your account</p>
        <p>To activate your Moja.link, you first need to verify your email address. </p>
        <ol>
          <li>Create your Moja.link, sign up <a href="/">here</a>.</li>
          <li>Check your inbox for our verification email (check your junk folder if you can't see the email).</li>
          <li>Click the link 'Verify Email' and instantly activate your account. </li>
        </ol>

        <br>
        <p style="font-weight: bold;">I am not receiving the verification email</p>

        <ul>
          <li>Double-check you've entered or registered the correct email address. </li>
          <li>Check your email's spam or Promotions (for Gmail) folders. If you found the email in these folders,
            mark them as "not spam" to make sure you receive future emails in your inbox.</li>
          <li>The verification link we email you will remain active for 72 hours. If it has expired,
            click the ‘Resend Verification Link’ button and we’ll get a fresh link to you.</li>
          <li>If you have requested multiple verification emails, please ensure you are viewing the most recent.</li>
        </ul>

        <br>

        <p style="font-weight: bold;">Now it's time to add your first link!</p>
        <p>Click <a href="how_to_create_link">here</a> to learn how to create a  link on Moja.link page.</p>
      </div>
    </div>
  </div>
</div>

@endsection
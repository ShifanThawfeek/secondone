@extends('layouts.public')

@section('content')

<div class="container-fluid hero">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p style="font-weight:bold; font-size: 35px;">How to create a link on your Moja.link</p>
        <p>Now you've signed up and verified your account, your next step is to add a link! Follow these simple steps: </p>
        <ol>
          <li>Go to Link in the dashboard.</li>
          <li>Go to the 'Add New Link’ section.</li>
          <br>
          <img src="assets/images/1_getting_started.png" style="height: 300px; width:300px;" alt="">
          <br>
          <li>Give your link a title, this will appear in the button on your Moja.link.</li>
          <li>Next, add a URL. </li>
          <li>Your link will now be live on your Moja.link, to hide this link simply click the edit button in the bottom right (yellow).</li>
          <li>Click the toggle button at the bottom to deactivate your link.</li>
          <br>
          <img src="assets/images/2_getting_started.png" style="height: 195px; width:367px;" alt="">
          <br><br>
          <img src="assets/images/3_getting_started.png" style="height: 195px; width:367px;" alt="">
        </ol>

        <br>
        <p style="font-weight: bold;">Troubleshooting</p>
        <p>What to do if your link is not showing on your Moja.link profile.</p>
        <p>If a link is not displaying on your Moja.link it could be due to the following:</p>

        <ul>
          <li>You have not added a title. </li>
          <li>Your link toggle is switched to 'off'.</li>
          <li>You have not added a valid URL (make sure to add http:// or https:// before the URL).</li>
          <li>The link you have entered is considered unsafe or malicious.</li>
        </ul>

        <br>

        <p>If you have any questions, please contact our customer support by emailing <a href="mailto: info@moja.link">info@moja.link</a></p>
      </div>
    </div>
  </div>
</div>

@endsection
<?php include 'includes/header.php' ?>
<?php include 'includes/nav.php' ?>
<html>

<body>
  <!-- About us -->
  <section class="py-5" id="about">
    <div class="container">
      <h1>Rreth Nesh</h1>
      <p>Mund të na keni përzgjedhur për shkak të vendodhjes strategjike, për shërbimin dhe mikpritjen legjendare Austriake, për mundësinë e krijimit të një rrethi social elitar apo për bukuritë e kopshtit tonë... Por cilado të jetë arsyeja, e kemi për kënaqësi t’ju mirëpresim dhe të sigurojmë një qëndrim sa më të frytshëm e më komod të jetë e mundur.</p>
        <br><br>
        <strong>Lehtesira</strong>
        <ul>
          <li>Wireless</li>
          <li>Kondicioner</li>
          <li>Televizor Full HD</li>
          <li>DVD Player</li>
          <li>Tryeze Biznesi</li>
          <li>Telefon per Telefonata Internacionale</li>
          <li>Kasaforte</li>
          <li>Mini Bar</li>
          <li>Lehtesira per Berjen e Kafes dhe Cajit</li>
        </ul>
        <strong>Sherbimet</strong>
        <br>
        <ul>
          <li>Kordinator Eventesh</li>
          <li>Mundesi per Organizime Festash ne Hapesirat Tona</li>
          <li>Restorant Tradicional, Italian dhe Kinez</li>
          <li>Zone Relaksi dhe Spa</li>
          <li>Palester</li>
          <li>Pishine</li>
          <li>Per me shume detaje, ju lutem na kontaktoni duke plotesuar formularin me poshte!</li>
        </ul </p>
    </div>
  </section>
  <!-- Gallery -->
  <section class="bg-light" id="gallery">
    <div class="container">
      <div class="row">

        <div class="container">
          <div class="row">
            <div class="col-sm-4"><img class="gallery-img" src="images/Room1.jpg" /> <figcaption class="figure-caption text-center">Standard Rooms</figcaption></div>
            <div class="col-sm-4"><img class="gallery-img" src="images/Room2.jpg" /> <figcaption class="figure-caption text-center">Luxury Rooms</figcaption></div>
            <div class="col-sm-4"><img class="gallery-img" src="images/Room3.jpg" /> <figcaption class="figure-caption text-center">Suit Rooms</figcaption></div>
            <div class="col-sm-4"><img class="gallery-img" src="images/Room4.jpg" /> <figcaption class="figure-caption text-center">Perfect View</figcaption></div>
            <div class="col-sm-4"><img class="gallery-img" src="images/Room5.jpg" /> <figcaption class="figure-caption text-center">First Class Service</figcaption></div>
            <div class="col-sm-4"><img class="gallery-img" src="images/Room6.jpg" /> <figcaption class="figure-caption text-center">Home away from Home</figcaption></div>
          </div>
        </div>

      </div>
    </div>

  </section>
<br>
<br>
<br>
<br>
<br>
  <section class="py-5" id="contact">
        <div class="container" align="center"  style="margin-left:22%;margin-top:5%;">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h1>Na Kontaktoni</a></h1>
                        <p class="lead">Per cdo kerkese apo paqartesi, ne jemi ketu per t'ju asistuar.</p>
                           <form id="contact-form" method="post" action="action.php" role="form">
                             <div class="messages"></div>
                               <div class="controls">
                                   <div class="row">
                                       <div class="col-md-6">
                                           <div class="form-group">
                                               <label for="form_name">Emri *</label>
                                               <input id="form_name" type="text" name="name" class="form-control" placeholder="Ju lutem jepni emrin tuaj *" required="required" data-error="Firstname is required.">
                                               <div class="help-block with-errors"></div>
                                           </div>
                                       </div>
                                       <div class="col-md-6">
                                           <div class="form-group">
                                               <label for="form_lastname">Mbiemri *</label>
                                               <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Ju lutem jepni mbiemrin tuaj *" required="required" data-error="Lastname is required.">
                                               <div class="help-block with-errors"></div>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="row">
                                       <div class="col-md-6">
                                           <div class="form-group">
                                               <label for="form_email">E-Mail *</label>
                                               <input id="form_email" type="email" name="email" class="form-control" placeholder="Ju lutem jepni email-in tuaj *" required="required" data-error="Valid email is required.">
                                               <div class="help-block with-errors"></div>
                                           </div>
                                       </div>
                                       <div class="col-md-6">
                                           <div class="form-group">
                                               <label for="form_phone">Telefon</label>
                                               <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Ju lutem jepni numrin tuaj te kontaktit" maxlength="13" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                               <div class="help-block with-errors"></div>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="row">
                                       <div class="col-md-12">
                                           <div class="form-group">
                                               <label for="form_message">Mesazh *</label>
                                               <textarea id="form_message" name="message" class="form-control" placeholder="Mesazhi juaj *" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                                               <div class="help-block with-errors"></div>
                                           </div>
                                       </div>
                                       <div class="col-md-12">
                                           <input type="submit" name="submit" class="btn btn-secondary btn-send" value="Dergo Mesazhin">
                                       </div>
                                   </div>
                                   <div class="row">
                                       <div class="col-md-12">
                                           <p class="text-muted"><strong>*</strong> Keto fusha jane te detyruara. </p>
                                       </div>
                                   </div>
                               </div>
                           </form>
                      </div>
                  </div>
              </div>
          </section>


<br>
<br>
<br>
</body>
<?php include 'includes/footer.php' ?>

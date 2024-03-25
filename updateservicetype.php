<?php
include('connect.php');
include('header1.php');
?>

<style = "text/css">
  .updateservicetype
    {
    background-color: #d4af37;
    } 
</style>

<main id="main">


<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container">

    <div class="section-title">
      <span>Update Service Type</span>
      <h2>Update Service Type</h2>
     
    </div>

    <div class="row" data-aos="fade-up">

      <div class="col-lg-12">
        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
          <div class="row">
            
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="ServiceTypeID" id="servicetypeid" placeholder="ServiceTypeID" required>
          </div>

          <div class="form-group mt-3">
            <input type="text" class="form-control" name="ServiceTypeName" id="servicetypename" placeholder="ServiceTypeName" required>
          </div>

          
        
          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div>
          <div class="text-center"><button type="submit">Send Message</button></div>
        </form>
      </div>

    </div>

  </div>
</section><!-- End Contact Section -->

</main><!-- End #main -->


</body>

</html>

<?php
include('footer.php');
?>
<?php
include 'head.php';
include 'header.php';

?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container position-relative">
      <h1></h1>
      <h2></h2>
      
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="nosotros" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6">
            <img src="assets/img/img_nosotros.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <h3><?php echo $mostrar['Nom_Gym']?></h3>
            <p>Somos un equipo apasionado de profesionales dedicados a ayudarte a alcanzar tus objetivos de fitness y salud.
               Nos enorgullece ofrecer un ambiente acogedor, amigable y seguro donde nuestros miembros pueden entrenar, socializar y mejorar su salud en general.<br></p>
                <p>En resumen, nuestro objetivo es ser el mejor gimnasio en el que haya un buen bienestar saludable. Estamos comprometidos a brindarte un ambiente de entrenamiento excepcional, una experiencia positiva y resultados duraderos. Ven a visitarnos y únete a nuestra comunidad de miembros motivados y comprometidos a lograr un estilo de vida saludable y activo. ¡Te esperamos!</p>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contactenos</h2>
          <p>¡Nos encantaría saber de ti! En nuestro gimnasio, valoramos la comunicación con nuestros clientes y nos esforzamos por brindar un servicio excepcional. Si tienes alguna pregunta, inquietud o simplemente deseas obtener más información sobre nuestros programas y servicios, no dudes en ponerte en contacto con nosotros. Nuestro equipo de atención al cliente está aquí para ayudarte y responder a todas tus consultas. Puedes contactarnos por teléfono, correo electrónico o visitar nuestras instalaciones para hablar directamente con uno de nuestros expertos en fitness. ¡Estamos ansiosos por escucharte y ayudarte a alcanzar tus metas de bienestar y acondicionamiento físico!</p>
        </div>

        <div class="row">

          <div class="col-lg-12">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Encuentranos</h3>
                  <p>Cl. 23, Chinauta, La Serena, Fusagasugá, Cundinamarca</p>
                  <iframe src="<?php echo $mostrar['Dir_Gym'] ?>">
                  </iframe>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Us</h3>
                  <p><?php echo $mostrar['Corr_Gym']?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bxl-whatsapp"></i>
                  <h3>WhatsApp</h3>
                  <p><?php echo $mostrar['Tel_Gym']?></p>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
<?php
include 'footer.php';
include 'scripts.php';
?>
</body>
</html>
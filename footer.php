<!-- ======= Footer ======= -->
<?php include ('assets/conexion.php');

$gimnasios = "SELECT * from gimnasios";
$query = mysqli_query($con, $gimnasios);

$facebook = mysqli_fetch_array($query);?>
<footer id="footer">
  <div class="container d-md-flex py-4">

    <div class="me-md-auto text-center text-md-start pt-2">
      <div class="copyright">
        &copy; Copyright <strong><span>DataGym</span></strong>. Todos los Derechos Reservados
      </div>
    </div>
    <div class="social-links text-center text-md-right pt-3 pt-md-0">
      <a href="<?php echo $facebook['Fcb_Gym']?>" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
      <a href="<?php echo $facebook['Fcb_Gym']?>" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
    </div>
  </div>
</footer><!-- End Footer -->
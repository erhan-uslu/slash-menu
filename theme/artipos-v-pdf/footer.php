
    <!-- Footer Start -->
    <footer class="footer-wrap" style="display: none;">
      <ul class="footer">
        <li class="footer-item">
          <a href="./?masa_id_no=<?php echo $_GET['masa_id_no']; ?>" class="footer-link">
            <i class="iconly-Home icli"></i>
            <span>Anasayfa</span>
          </a>
        </li>
       
        </li>
<?php if($garson_modulu==1){ ?>

           <li class="footer-item">
          <a href="garson-cagir/?masa_id_no=<?php echo $_GET['masa_id_no']; ?>&status=1" class="footer-link">
            <i class="iconly-Notification icli"></i>
            <span>Garson Çağır</span>
          </a>
        </li>
      <?php } ?>
        <li class="footer-item">
          <a href="iletisim/?masa_id_no=<?php echo $_GET['masa_id_no']; ?>" class="footer-link">
            <i class="iconly-Call icli"></i>
            <span>İletişim</span>
          </a>
        </li>
      
      
      </ul>
    </footer>
    <!-- Footer End -->

    <!-- Action Language Start -->
    <div class="action action-language offcanvas offcanvas-bottom" tabindex="-1" id="language" aria-labelledby="language">
      <div class="offcanvas-body small">
        <h2 class="m-b-title1 font-md">Select Language</h2>

        <ul class="list">
          <li>
            <a href="javascript:void(0)" data-bs-dismiss="offcanvas" aria-label="Close"> <img src="assets\icons\flag\us.svg" alt="us"> English </a>
          </li>

          <li>
            <a href="javascript:void(0)" data-bs-dismiss="offcanvas" aria-label="Close"> <img src="assets\icons\flag\in.svg" alt="us">Indian </a>
          </li>

          <li>
            <a href="javascript:void(0)" data-bs-dismiss="offcanvas" aria-label="Close"> <img src="assets\icons\flag\it.svg" alt="us">Italian</a>
          </li>

          <li>
            <a href="javascript:void(0)" data-bs-dismiss="offcanvas" aria-label="Close"> <img src="assets\icons\flag\tf.svg" alt="us"> French</a>
          </li>

          <li>
            <a href="javascript:void(0)" data-bs-dismiss="offcanvas" aria-label="Close"> <img src="assets\icons\flag\cn.svg" alt="us"> Chines</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- Action Language End -->
 

    <!-- jquery 3.6.0 -->
    <script src="assets\js\jquery-3.6.0.min.js"></script>

    <!-- Bootstrap Js -->
    <script src="assets\js\bootstrap.bundle.min.js"></script>

    <!-- Lord Icon -->
    <script src="assets\js\lord-icon-2.1.0.js"></script>

    <!-- Feather Icon -->
    <script src="assets\js\feather.min.js"></script>

    <!-- Slick Slider js -->
    <script src="assets\js\slick.js"></script>
    <script src="assets\js\slick.min.js"></script>
    <script src="assets\js\slick-custom.js"></script>

    <!-- Add To Home  js -->
    <script src="assets\js\homescreen-popup.js"></script>

    <!-- Theme Setting js -->
    <script src="assets\js\theme-setting.js"></script>

    <!-- Script js -->
    <script src="assets\js\script.js"></script>
  </body>
  <!-- Body End -->
</html>

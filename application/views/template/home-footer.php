        <!--====== Footer Area Start ======-->
        <footer class="footer-area footer-fixed">
            <!-- Footer Top -->
            <div class="footer-top ptb_100">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-4">
                            <!-- Footer Items -->
                            <div class="footer-items">
                                <!-- Logo -->
                                <a class="navbar-brand" href="#">
                                    <img class="logo" src="<?= base_url("images/assets/". $site->icon_dark) ?>" alt="" style="width:50px">
                                </a>
                                <p class="mt-2 mb-3"><?= $site->description ?></p>
                                <!-- Social Icons -->
                                <div class="social-icons d-flex">
                                    <a class="facebook" href="#">
                                        <i class="fab fa-facebook-f"></i>
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a class="google-plus" href="#">
                                        <i class="fab fa-instagram"></i>
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-lg-4">
                            <!-- Footer Items -->
                            <div class="footer-items">
                                <!-- Footer Title -->
                                <h3 class="footer-title mb-2">Informasi</h3>
                                <ul>
                                    <li class="py-2"><a href="#">Tentang Kami</a></li>
                                    <li class="py-2"><a href="#">Kebijakan Privasi</a></li>
                                    <li class="py-2"><a href="#">Syarat & Ketentuan</a></li>
                                    <li class="py-2"><a href="#">Afiliasi</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-lg-4">
                            <!-- Footer Items -->
                            <div class="footer-items">
                                <!-- Footer Title -->
                                <h3 class="footer-title mb-2">Bantuan</h3>
                                <ul>
                                    <li class="py-2"><a href="#">Hubungi Kami</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- Copyright Area -->
                            <div class="copyright-area d-flex flex-wrap justify-content-center justify-content-sm-between text-center py-4">
                                <!-- Copyright Left -->
                                <div class="copyright-left">&copy; Copyrights <?= date("Y") ." ". $site->title ?> All rights reserved.</div>
                                <!-- Copyright Right -->
                                <!-- <div class="copyright-right">Made with <i class="fas fa-heart"></i> By <a href="#">Themeland</a></div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--====== Footer Area End ======-->
    </div>


    <!-- ***** All jQuery Plugins ***** -->

    <!-- jQuery(necessary for all JavaScript plugins) -->
    <script src="assets/js/jquery/jquery.min.js"></script>

    <!-- Bootstrap js -->
    <script src="assets/js/bootstrap/popper.min.js"></script>
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>

    <!-- Plugins js -->
    <script src="assets/js/plugins/plugins.min.js"></script>

    <!-- Active js -->
    <script src="assets/js/active.js"></script>
</body>
</html>
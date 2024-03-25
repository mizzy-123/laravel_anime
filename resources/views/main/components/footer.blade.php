<footer class="footer">
    <div class="page-up">
      <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="footer__logo">
            <a href="./index.html"><img src="img/logo.png" alt="" /></a>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="footer__nav">
            <ul>
              <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Homepage</a></li>
              <li class="{{ Request::is('anime-list') ? 'active' : '' }}"><a href="/anime-list">Anime List</a></li>
              <li><a href="/anime-genre">Genres</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3">
          <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;
            <script>
              document.write(new Date().getFullYear());
            </script>
            <i class="fa fa-heart" aria-hidden="true"></i> by <a href="#" target="_blank">Titonime</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>
      </div>
    </div>
  </footer>
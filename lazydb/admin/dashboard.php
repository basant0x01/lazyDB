<?php include "header.php"; ?>

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Projects</div>
            <div class="number">143</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Lorem Ipsum</span>
            </div>
          </div>
          <i class='bx bx-cart-alt cart'></i>
        </div>

        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Subdomains</div>
            <div class="number">58,876</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Added in last 24/hr</span>
            </div>
          </div>
          <i class='bx bxs-cart-add cart two' ></i>
        </div>

        <div class="box">
          <div class="right-side">
            <div class="box-topic">New Subdomains</div>
            <div class="number">64</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Found in last 24/hr</span>
            </div>
          </div>
          <i class='bx bx-cart cart three' ></i>
        </div>

        <div class="box">
          <div class="right-side">
            <div class="box-topic">Subdomain Takeover's</div>
            <div class="number">14</div>
            <div class="indicator">
              <i class='bx bx-down-arrow-alt down'></i>
              <span class="text">No Data Available</span>
            </div>
          </div>
          <i class='bx bxs-cart-download cart four' ></i>
        </div>
      </div>

      <div class="sales-boxes">
        <div class="recent-sales box">
      <div class="title">Bughunting Programs</div><br> 

          <div class="sales-details">
            <ul class="details">
            <li class="topic">Program Name</li>
            <li><a href="#">Telefonica</a></li>
          </ul>

          <ul class="details">
            <li class="topic">Visibility</li>
            <li><a href="#">Private</a></li>
          </ul>

          <ul class="details">
            <li class="topic">Platform</li>
            <li><a href="#">YesWeHack</a></li>
          </ul>
          </div>
        </div>

        <div class="top-sales box">
          <div class="title">Favorite Technology</div>
          <ul class="top-sales-details">
            <li>
            <a href="#">
              <img src="images/sunglasses.jpg" alt="">
              <span class="product">CMS - Wordpress</span>
            </a>
            <span class="price">2234</span>
          </li>
          <li>
            <a href="#">
              <img src="images/jeans.jpg" alt="">
              <span class="product">Java</span>
            </a>
            <span class="price">23</span>
          </li>
          <li>
            <a href="#">
              <img src="images/nike.jpg" alt="">
              <span class="product">Cloudflare</span>
            </a>
            <span class="price">334</span>
          </li>
 
          </ul>
        </div>
      </div>
    </div>
  </section>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

</body>
</html>

<div class="sidebar" data-color="white" data-active-color="danger">
  <div class="logo">
    <a href="https://www.creative-tim.com" class="simple-text logo-mini">
      <div class="logo-image-small">
        <img src="{{asset('assetsadmin/img/logo-small.png')}}">
      </div>
      <!-- <p>CT</p> -->
    </a>
    <a href="" class="simple-text logo-normal">
      {{Auth::user()->name}}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li >
        <a href="/admin">
          <i class="nc-icon nc-bank"></i>
          <p>DASHBOARD</p>
        </a>
      </li>
      <li>
        <a href="/admin/users">
          <i class="nc-icon nc-single-02"></i>
          <p>USERS</p>
        </a>
      </li>
      <li>
        <a href="/admin/categories">
          <i class="nc-icon nc-bullet-list-67"></i>
          <p>CATEGORIES</p>
        </a>
      </li>
      <li>
        <a href="/admin/products">
          <i class="nc-icon nc-app"></i>
          <p>PRODUCTS</p>
        </a>
      </li>
      <li>
        <a href="/admin/pricing_plans">
          <i class="nc-icon nc-air-baloon"></i>
          <p>PRICING PLANS</p>
        </a>
      </li>
      <li>
        <a href="/admin/it_works">
          <i class="nc-icon nc-credit-card"></i>
          <p>IT WORKS</p>
        </a>
      </li>
    </ul>
  </div>
  <script>
    $(function() {
        $('.nav li a[href^="/admin/' + location.pathname.split("/admin/")[1] + '"]').addClass('active');
    });
  </script>
</div>
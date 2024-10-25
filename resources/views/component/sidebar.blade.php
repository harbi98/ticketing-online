<!-- <div class="sidebar">
  <a class="active" href="dashboard">Dashboard</a>
  <a href="sales">Sales</a>
  <a href="tickets">Tickets</a>
</div> -->
<style>
  @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

  :root {
    --nav-width: 21vh;
    --first-color: black;
    --first-color-light: gray;
    --white-color: white;
    --body-font: "Nunito", sans-serif;
    --normal-font-size: 1rem;
    --z-fixed: 100;
  }

  *,
  ::before,
  ::after {
    box-sizing: border-box;
  }

  a {
    text-decoration: none;
  }

  .l-navbar {
    position: fixed;
    top: 0;
    left: -30%;
    width: var(--nav-width);
    height: 100vh;
    background-color: var(--first-color);
    padding: 0.5rem 1rem 0 0;
    transition: 0.5s;
    z-index: var(--z-fixed);
  }

  .nav {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    overflow: hidden;
  }

  .nav_logo,
  .nav_link {
    display: grid;
    grid-template-columns: max-content max-content;
    align-items: center;
    column-gap: 1rem;
    padding: 0.5rem 0 0.5rem 1.5rem;
  }

  .nav_logo {
    margin-bottom: 2rem;
  }

  .nav_logo-icon {
    font-size: 1.25rem;
    color: var(--white-color);
  }

  .nav_logo-name {
    color: var(--white-color);
    font-weight: 700;
  }

  .nav_link {
    position: relative;
    color: var(--first-color-light);
    margin-bottom: 1.5rem;
    transition: 0.3s;
  }

  .nav_link:hover {
    color: var(--white-color);
  }

  .nav_icon {
    font-size: 1.25rem;
  }

  .active {
    color: var(--white-color);
  }

  .active::before {
    content: "";
    position: absolute;
    left: 0;
    width: 2px;
    height: 32px;
    background-color: var(--white-color);
  }

  .height-100 {
    height: 100vh;
  }

  @media screen and (min-width: 768px) {
    body {
      margin: calc(var(--header-height) + 1rem) 0 0 0;
      padding-left: calc(var(--nav-width) + 2rem);
    }

    .l-navbar {
      left: 0;
      padding: 1rem 1rem 0 0;
    }

  }
</style>
<div class="l-navbar" id="nav-bar">
  <nav class="nav">
    <div> 
      <a href="#" class="nav_logo"> 
        <i class='bx bx-layer nav_logo-icon'></i> 
        <span class="nav_logo-name">Ticketing</span> 
      </a>
      <div class="nav_list"> 
        <a href="dashboard" class="nav_link {{ request()->routeIs('dashboard') ? 'active' : '' }}"> 
          <i class='bx bx-grid-alt nav_icon'></i> 
          <span class="nav_name">Dashboard</span> 
        </a> 
        <a href="sales" class="nav_link {{ request()->routeIs('sales') ? 'active' : '' }}"> 
          <i class='bx bx-bar-chart-alt nav_icon'></i>
          <span class="nav_name">Sales</span> 
        </a> 
        <a href="tickets" class="nav_link {{ request()->routeIs('tickets') ? 'active' : '' }}"> 
          <i class='bx bxs-coupon nav_icon'></i>
            <span class="nav_name">Tickets</span> 
        </a> 
        <!-- <a href="#" class="nav_link"> 
          <i class='bx bx-bookmark nav_icon'></i> 
          <span class="nav_name">Bookmark</span> 
        </a> 
        <a href="#" class="nav_link"> 
            <i class='bx bx-folder nav_icon'></i> 
            <span class="nav_name">Files</span> 
        </a> 
        <a href="#" class="nav_link"> 
          <i class='bx bx-bar-chart-alt-2 nav_icon'></i> 
          <span class="nav_name">Stats</span>
        </a>  -->
      </div>
    </div> 
    <a href="#" class="nav_link"> 
      <i class='bx bx-log-out nav_icon'></i> 
      <span class="nav_name">SignOut</span>
    </a>
  </nav>
</div>
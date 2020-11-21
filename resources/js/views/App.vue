<template>
  <div>
    <div class="d-flex" id="wrapper">
      <!-- Sidebar -->
      <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">Comps</div>
        <div class="list-group list-group-flush">
          <div class="border-bottom">
            <router-link :to="{ name: 'home' }" class="list-group-item list-group-item-action bg-light border-0">General Information</router-link>
          </div>
          <div class="border-bottom">
            <p class="list-group-item list-group-item-action bg-light border-0 mb-0">Pathways</p>
            <router-link :to="{ name: 'hello' }" class="list-group-item list-group-item-action bg-light border-0">
              <span class="ml-3">Pathway 1</span>
            </router-link>
          </div>
          <div class="border-bottom">
            <p class="list-group-item list-group-item-action bg-light border-0 mb-0">Outcomes</p>
            <router-link :to="{ name: 'hello' }" class="list-group-item list-group-item-action bg-light border-0">
              <span class="ml-3">Outcome 1</span>
            </router-link>
          </div>
          <div class="border-bottom">
            <router-link :to="{ name: 'home' }" class="list-group-item list-group-item-action bg-light border-0">Milestones</router-link>
          </div>
          <div class="border-bottom">
            <router-link :to="{ name: 'home' }" class="list-group-item list-group-item-action bg-light border-0">Financial Information</router-link>
          </div>
        </div>
      </div>
      <!-- /#sidebar-wrapper -->

      <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
          <button class="btn home-page__button" id="menu-toggle">
            <i class="fas fa-bars"></i>
          </button>
        </nav>
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>
<script>
export default {};
</script>

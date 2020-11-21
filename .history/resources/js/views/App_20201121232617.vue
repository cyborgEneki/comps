<template>
    <div>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <div class="bg-light border-right" id="sidebar-wrapper">
                <div class="sidebar-heading">Comps</div>
                <div class="list-group list-group-flush">
                    <router-link
                        :to="{ name: 'home' }"
                        class="list-group-item list-group-item-action bg-light"
                        >General Information</router-link
                    >
                    <router-link
                        :to="{ name: 'hello' }"
                        class="list-group-item list-group-item-action bg-light"
                        >Pathway 1</router-link
                    >
                </div>
            </div>
            <!-- /#sidebar-wrapper -->

            <div id="page-content-wrapper">
                <nav
                    class="navbar navbar-expand-lg navbar-light bg-light border-bottom"
                >
                    <button class="btn btn-primary" id="menu-toggle">
                        Toggle Menu
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

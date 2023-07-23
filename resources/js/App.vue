<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #E6E6FA;">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/customer" class="nav-item nav-link">Customers List</router-link>
                    <router-link to="/customer/add" class="nav-item nav-link">Create New Customer</router-link>
                </div>
            </div>
        </nav>
        <router-view> </router-view>
    </div>
</template>

<script>
export default {}
</script>

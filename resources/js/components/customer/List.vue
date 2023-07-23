<template>
    <div class="row">
        <div class="col-12 mt-2 mb-2 text-end">
            <router-link :to="{ name: 'customerAdd' }" class="btn btn-primary">Add New Customer</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Customer</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody v-if="loading">
                            <tr>
                                <td colspan="4" class="text-center">
                                    <i class="fa fa-spinner fa-spin"></i> Loading...
                                </td>
                            </tr>
                            </tbody>
                            <tbody v-else>
                            <tr v-if="customers.length > 0" v-for="(customer, key) in customers" :key="key">
                                <td>{{ customer.id }}</td>
                                <td>{{ customer.name }}</td>
                                <td>{{ customer.email }}</td>
                                <td>{{ customer.phone_number === '' ? 'No phone number added' : customer.phone_number }}</td>
                                <td>
                                    <router-link :to="{ name: 'customerEdit', params: { id: customer.id } }" class="btn btn-success" style="margin-right: 5px;">Edit</router-link>
                                    <router-link :to="{ name: 'customerShow', params: { id: customer.id } }" class="btn btn-primary" style="margin-right: 5px;">View Details</router-link>
                                    <button type="button" @click="deleteCustomer(customer.id)" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr v-else>
                                <td colspan="4" align="center">No Customers Found.</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"customers",
    data(){
        return {
            customers:[],
            loading: true,
        }
    },
    mounted(){
        this.getCustomers()
    },
    methods:{
        async getCustomers(){
            await this.axios.get('/api/customers').then(response=>{
                this.customers = response.data.data
            }).catch(error=>{
                console.log(error)
                this.customers = []
            }).finally(() => this.loading = false)
        },
        deleteCustomer(id){
            if(confirm("Are you sure to delete this customer ?")){
                this.axios.delete(`/api/customers/${id}`).then(response=>{
                    this.getCustomers()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>

<style scoped>
</style>

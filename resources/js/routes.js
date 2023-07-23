const Welcome = () => import('./components/Welcome.vue' /* webpackChunkName: "resource/js/components/welcome" */)
const CustomerList = () => import('./components/customer/List.vue' /* webpackChunkName: "resource/js/components/customer/list" */)
const CustomerCreate = () => import('./components/customer/Add.vue' /* webpackChunkName: "resource/js/components/customer/add" */)
const CustomerEdit = () => import('./components/customer/Edit.vue' /* webpackChunkName: "resource/js/components/customer/edit" */)
const CustomerShow = () => import('./components/customer/Show.vue' /* webpackChunkName: "resource/js/components/customer/show" */)

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Welcome
    },
    {
        name: 'customerList',
        path: '/customer',
        component: CustomerList
    },
    {
        name: 'customerEdit',
        path: '/customer/:id/edit',
        component: CustomerEdit
    },{
        name: 'customerShow',
        path: '/customer/:id',
        component: CustomerShow
    },
    {
        name: 'customerAdd',
        path: '/customer/add',
        component: CustomerCreate
    }
]

require('./bootstrap');



import routes from "./Router/routes";


const app = new Vue({
    el: "#app",
    routes
})

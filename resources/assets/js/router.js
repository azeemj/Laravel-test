import VueRouter    from 'vue-router'
//Define route components
const Home = { template: '<div>home content</div>' }

// lazy load components
const Chart = (resolve) => require(['./components/Chart.vue'], resolve)
export default new VueRouter({
    mode: 'history',
    base: __dirname,
      routes: [
        { path: '/', component: Home },
        { path: '/chart', component: Chart }
       
      ]
});

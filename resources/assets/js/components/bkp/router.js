import VueRouter    from 'vue-router'

//Define route components
const Home = { template: '<div>home content</div>' }
const Foo = { template: '<div>Foo</div>' }
const Bar = { template: '<div>Bar</div>' }


// lazy load components
const Chart = (resolve) => require(['./components/Chart.vue'], resolve)
const Room = (resolve) => require(['./components/Room.vue'], resolve)
export default new VueRouter({
    mode: 'history',
    base: __dirname,
      routes: [
        { path: '/', component: Home },
        { path: '/foo', component: Room },
        { path: '/chart', component: Chart },
        { path: '/rooms', component: Room } // example of route with a seperate component
      ]
});

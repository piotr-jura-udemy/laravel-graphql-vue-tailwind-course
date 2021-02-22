import ApolloClient from 'apollo-boost';
import hljs from 'highlight.js';
import javascript from 'highlight.js/lib/languages/javascript';
import moment from 'moment';
import Vue from 'vue';
import VueApollo from 'vue-apollo';
import VueRouter from 'vue-router';
import AuthorPostList from './AuthorPostList';
import './bootstrap';
import DarkMode from "./components/DarkMode";
import Footer from './components/Footer';
import Header from './components/Header';
import CourseList from './CourseList';
import NotFound from './NotFound';
import Post from './Post';
import PostList from './PostList';
import TopicPostList from './TopicPostList';
hljs.registerLanguage('javascript', javascript);

window.Vue = Vue;
window.hljs = hljs;
Vue.use(VueRouter);
Vue.use(VueApollo);

const routes = [
  {
    path: '/',
    name: 'index',
    component: PostList
  },
  {
    path: '/post/:id',
    name: 'post',
    component: Post
  },
  {
    path: '/topics/:slug',
    name: 'topic',
    component: TopicPostList
  },
  {
    path: '/authors/:id',
    name: 'author',
    component: AuthorPostList
  },
  {
    path: '*',
    name: '404',
    component: NotFound
  },
  {
    path: '/courses',
    name: 'courses',
    component: CourseList
  }
];
const apolloClient = new ApolloClient({
  // You should use an absolute URL here
  uri: window.GQL_URI
});
const apolloProvider = new VueApollo({
  defaultClient: apolloClient,
});
const router = new VueRouter({
  mode: 'history',
  routes,
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition;
    }

    if (to.hash) {
      return { selector: to.hash, behavior: 'smooth' };
    }

    return false;
  }
});

Vue.filter("timeago", value => moment(value).fromNow());
Vue.filter("longDate", value => moment(value).format("MMMM Do YYYY"));

export const toggleDarkMode = () => {
  let darkMode = getDarkMode();

  if (darkMode) {
    document.documentElement.classList.add("dark");
    document.querySelector(`link[title="dark"]`).removeAttribute("disabled");
    document.querySelector(`link[title="light"]`).setAttribute("disabled", "disabled");
    return;
  }

  document.documentElement.classList.remove("dark");
  document.querySelector(`link[title="dark"]`).setAttribute("disabled", "disabled");
  document.querySelector(`link[title="light"]`).removeAttribute("disabled");
}

export const getDarkMode = () => {
  return Number(window.localStorage.getItem("darkMode")) === 1;
}

export const setDarkMode = (isDark) => {
  window.localStorage.setItem("darkMode", isDark ? 1 : 0);
}

Vue.component('DarkMode', DarkMode);
Vue.component('PageFooter', Footer);
Vue.component('PageHeader', Header);

const app = new Vue({
  el: '#app',
  apolloProvider,
  router,
  beforeMount() {
    toggleDarkMode();
  },
});

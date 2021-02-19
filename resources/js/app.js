import ApolloClient from 'apollo-boost';
import moment from 'moment';
import Vue from 'vue';
import VueApollo from 'vue-apollo';
import VueRouter from 'vue-router';
import AuthorPostList from './AuthorPostList';
import './bootstrap';
import DarkMode from "./components/DarkMode";
import NotFound from './NotFound';
import Post from './Post';
import PostList from './PostList';
import TopicPostList from './TopicPostList';

window.Vue = Vue;
Vue.use(VueRouter);

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
  }
];

Vue.use(VueApollo);

const apolloClient = new ApolloClient({
  // You should use an absolute URL here
  uri: window.GQL_URI
});

const apolloProvider = new VueApollo({
  defaultClient: apolloClient,
});

const router = new VueRouter({
  mode: 'history',
  routes
});

Vue.filter("timeago", value => moment(value).fromNow());
Vue.filter("longDate", value => moment(value).format("MMMM Do YYYY"));

export const toggleDarkMode = () => {
  let darkMode = getDarkMode();

  if (darkMode) {
    document.documentElement.classList.add("dark");
    return;
  }

  document.documentElement.classList.remove("dark");
}

export const getDarkMode = () => {
  return Number(window.localStorage.getItem("darkMode")) === 1;
}

export const setDarkMode = (isDark) => {
  window.localStorage.setItem("darkMode", isDark ? 1 : 0);
}

Vue.component('DarkMode', DarkMode);

const app = new Vue({
  el: '#app',
  apolloProvider,
  router,
  beforeMount() {
    toggleDarkMode();
  },
});

import ApolloClient from 'apollo-boost';
import Vue from 'vue';
import VueApollo from 'vue-apollo';
import VueRouter from 'vue-router';
import AuthorPostList from './AuthorPostList';
import './bootstrap';
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
    }
];

Vue.use(VueApollo);
const apolloClient = new ApolloClient({
    // You should use an absolute URL here
    uri: 'http://127.0.0.1:8000/graphql'
});

const apolloProvider = new VueApollo({
    defaultClient: apolloClient,
});

const router = new VueRouter({
    mode: 'history',
    routes
});

const app = new Vue({
    el: '#app',
    apolloProvider,
    router
});

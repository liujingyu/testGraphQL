
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';

import router from './routes';

import './components';

import { ApolloClient, createBatchingNetworkInterface } from 'apollo-client';
import VueApollo from 'vue-apollo';

// Create the apollo client
const apolloClient = new ApolloClient({
    networkInterface: createBatchingNetworkInterface({
        uri: 'http://localhost:8000/graphql',
    }),
    connectToDevTools: true,
});

const apolloProvider = new VueApollo({
    defaultClient: apolloClient,
})

const app = new Vue({
    el: '#app',
    router,
    // Apollo GraphQL
    apolloProvider,
});

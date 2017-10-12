<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                         <h1>Blog</h1>
                         <div>{{hello}}</div>
                         <input type="text" v-model="code" placeholder="Enter a message" />

                         <div v-if="pigs">
                             <table>
                                 <div v-for="pig in pigs">
                                     <tr>
                                         <td>{{pig.id}}</td>
                                         <td>{{pig.code}}</td>
                                         <td>{{pig.birth}}</td>
                                     </tr>
                                     <hr>
                                 </div>
                             </table>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import gql from 'graphql-tag'

export default {
    mounted() {
        console.clear();
    },
    apollo: {
        hello: gql`{hello}`,
        // Query with parameters
        pigs: {
            // gql query
            query: gql`query Pigs($id: String) {
                pigs(id: $id) {
                    id
                    code
                    birth
                }
            }`,
            // Reactive parameters
            variables() {
                // Use vue reactive properties here
                return {
                    id: this.code,
                }
            },
             // Additional options here
            //fetchPolicy: 'cache-and-network',
        },
    },
    data() {
        return {
            hello: '',
            pigs: [],
            code:""
        }
    },
}
</script>

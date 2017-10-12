<template>
    <div class="container">
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
</template>

<script>
import gql from 'graphql-tag'

export default {
    apollo: {
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
                    id: "1",
                }
            },
             // Additional options here
            //fetchPolicy: 'cache-and-network',
        },
    },
    data() {
        return {
            pigs: [],
        }
    },
}
</script>

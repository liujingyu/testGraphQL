<template>
	<section>
		<h3 class="page-header">Pigs</h3>
		<div class="panel-body">
			<div v-if="model">
				<vue-form-generator :schema="schema" :model="model" :options="formOptions"></vue-form-generator>
			</div>
		</div>
		<example></example>
	</section>
</template>


<script>
import gql from 'graphql-tag'

import VueFormGenerator from "vue-form-generator";
Vue.use(VueFormGenerator);

// GraphQL Mutation with one parameter
const upvoteMutation = gql`
  mutation createPig($code: String, $name: String) {
      createPig(code: $code, name: $name, birth:"2017-12-12") {
              id
              birth
              name
              code
          }
    }
`;

export default {
    apollo: {
        // Query with parameters
        abc: {
            // gql query
            query: gql`query Pigs($id: String) {
                pigs(id: $id) {
                    id
                    code
					name
                    birth
                }
            }`,
            // Reactive parameters
            variables() {
                // Use vue reactive properties here
                return {
                    id: "2",
                }
            },
             // Additional options here
			fetchPolicy: 'cache-and-network',
		    update: data => data['pigs'][0],
			pollInterval: 300, // ms

        },
    },
	data() {

        self = this;
		return {

			model: {
				id: "",
				code:"",
				name:"",
			},

			schema: {
				fields: [{
					type: "input",
					inputType: "hidden",
					label: "",
					model: "id",
					readonly: true,         
					disabled: true
				},{
					type: "input",
					inputType: "text",
					label: "Code (disabled text field)",
					model: "code",
				},{
					type: "input",
					inputType: "text",
					label: "Name",
					model: "name",
					placeholder: "Your name",
					featured: true,
					required: true
				},{
					type: "submit",
					label: "",
					buttonText: "Submit",
					validateBeforeSubmit: true,
                    onSubmit: function (data) {
                        self.upvote(data)
                    }
				}]
			},

			formOptions: {
				validateAfterLoad: false,
				validateAfterChanged: false
			}
		}
	},
    methods: {
        upvote: function (data) {
            // Mutation
            this.$apollo.mutate({
                mutation: upvoteMutation,
                variables: {
                    code: data.code,
                    name: data.name,
                },
            }).then(data => {
                console.log('Done upvoting.');
            }).catch(err => {
                console.log(err);
            });
        },

    }
}

</script>

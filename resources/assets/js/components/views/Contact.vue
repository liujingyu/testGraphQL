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

export default {
    apollo: {
        // Query with parameters
        model: {
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
					readonly: true,         
					disabled: true
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
					validateBeforeSubmit: true
				}]
			},

			formOptions: {
				validateAfterLoad: false,
				validateAfterChanged: false
			}
		}
	}
}

</script>

<template>
    <div>
        <div v-if="loading">Loading....</div>
        <div v-else>
            <div v-if="contacts.length=== 0">
                <div
                    class="bg-yellow-100 border-t-4 border-yellow-500 rounded-b text-yellow-900 px-4 py-3 shadow-md"
                     role="alert">
                    <div class="flex items-center">
                        <div class="py-1"><svg class="fill-current h-6 w-6 text-yellow-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                        <div>
                            <p class="font-bold">No contact yet.
                                <router-link to="/contacts/create" class="border-b-2 border-yellow-600">Get
                                    started</router-link>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div v-for="contact in contacts">
                <router-link :to="'/contacts/'+contact.data.contact_id"
                             class="flex items-center border-b border-gray-400 p-4 hover:bg-gray-100">
                    <UserCircle :name="contact.data.name"/>
                    <div class="pl-4">
                        <p class="text-blue-500 font-bold">{{ contact.data.name }}</p>
                        <p class="text-gray-600">{{ contact.data.company }}</p>
                    </div>
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
import Swal from "sweetalert2";
import UserCircle from "./UserCircle";

export default {
    name: "ContactsList",
    components: {
        UserCircle,
    },
    props:[
        'endpoint',
    ],
    mounted() {
        axios.get(this.endpoint)
            .then(response => {
                this.contacts = response.data.data;
                this.loading  = false;
            })
            .catch(error => {
                this.loading = false;
                Swal.fire(
                    'Opps!',
                    'Internal Error. Unable to fetch contact.',
                    'error'
                )
            });
    },
    data: function () {
        return {
            loading: true,
            contacts: null
        }
    }
}
</script>

<style scoped>

</style>

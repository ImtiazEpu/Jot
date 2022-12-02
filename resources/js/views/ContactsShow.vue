<template>
    <div>
        <div v-if="loading">Loading...</div>
        <div v-else>
            <div class="flex justify-between">
                <a href="#" class="text-blue-400" @click="$router.back()">
                    < Back
                </a>
                <div>
                    <router-link :to="'/contacts/'+contact.contact_id+'/edit'"
                                 class="px-4 py-2 text-sm text-green-500 rounded border border-green-500 font-bold mr-2">
                        Edit
                    </router-link>
                    <a class="px-4 py-2 text-sm text-red-500 rounded border border-red-500 font-bold"
                       href="#" @click="showAlert">Delete</a>
                </div>
            </div>
            <div class="flex items-center pt-6">
                <UserCircle :name="contact.name"/>
                <p class="pl-5 text-xl">{{ contact.name }}</p>
            </div>
            <p class="pt-6 text-gray-600 font-bold uppercase text-sm">Contact</p>
            <p class="pt-2 text-blue-400">{{ contact.email }}</p>

            <p class="pt-6 text-gray-600 font-bold uppercase text-sm">Company</p>
            <p class="pt-2 text-blue-400">{{ contact.company }}</p>

            <p class="pt-6 text-gray-600 font-bold uppercase text-sm">Birthday</p>
            <p class="pt-2 text-blue-400">{{ contact.birthday }}</p>
        </div>
    </div>
</template>

<script>
import UserCircle from "../components/UserCircle";
import Swal from "sweetalert2";


export default {
    name: "ContactsShow",
    mounted() {
        axios.get('/api/contacts/' + this.$route.params.id)
            .then(response => {
                this.contact = response.data.data
                this.loading = false;
            })
            .catch(errors => {
                this.loading = false;
                if (errors.response.status === 404){
                    this.$router.push('/contacts');
                }
            })
    },
    data: function () {
        return {
            loading: true,
            contact: null,
        }
    },
    components: {
        UserCircle
    },
    methods: {
        showAlert: function () {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete('/api/contacts/' + this.$route.params.id)
                        .then(response => {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: 'Contact has been deleted.',
                                showConfirmButton: true,
                                allowEscapeKey: false,
                                allowOutsideClick: false,
                            }).then(() => {
                                this.$router.push('/contacts');
                            });
                        })
                        .catch(error => {
                            Swal.fire(
                                'Opps!',
                                'Internal Error. Unable to delete.',
                                'error'
                            )
                        })

                }
            })
        }
    }
}
</script>

<style scoped>

</style>

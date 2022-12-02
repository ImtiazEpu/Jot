<template>
    <div>
        <div class="flex justify-between">
            <a href="#" class="text-blue-400" @click="$router.back()">
                < Back
            </a>
        </div>
        <form @submit.prevent="submitForm">
            <InputField name="name" label="Contact Name" :errors="errors" placeholder="Full Name"
                        @update:field="form.name=$event" :data="form.name"/>
            <InputField name="email" label="Contact Email" :errors="errors" placeholder="your@domain.com"
                        @update:field="form.email=$event" :data="form.email"/>
            <InputField name="phone" label="Contact Phone" :errors="errors" placeholder="+880-xxx-xxx-xxxx"
                        @update:field="form.phone=$event" :data="form.phone"/>
            <InputField name="birthday" label="Birthday" :errors="errors" placeholder="MM/DD/YYYY"
                        @update:field="form.birthday=$event" :data="form.birthday"/>
            <InputField name="company" label="Company" :errors="errors" placeholder="Company"
                        @update:field="form.company=$event" :data="form.company"/>

            <div class="flex justify-end">
                <button class="border px-4 py-2 text-red-700 rounded mr-5 shadow hover:border-red-700">Cancel</button>
                <button class="text-white bg-blue-500 rounded px-4 py-2 shadow hover:bg-blue-400">Save
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import InputField from "../components/InputField";
import Swal from "sweetalert2";

export default {
    name: "ContactsEdit",

    components: {
        InputField
    },
    mounted() {
        axios.get('/api/contacts/' + this.$route.params.id)
            .then(response => {
                this.form    = response.data.data
                this.loading = false;
            })
            .catch(errors => {
                this.loading = false;
                if (errors.response.status === 404) {
                    this.$router.push('/contacts');
                }
            });
    },
    data: function () {
        return {
            form: {
                'name': '',
                'email': '',
                'phone': '',
                'birthday': '',
                'company': '',
            },
            errors: null,
        }
    },

    methods: {
        submitForm: function () {
            axios.patch('/api/contacts/' + this.$route.params.id, this.form)
                .then(response => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Updated!',
                        text: 'Contact has been updated successfully.',
                        showConfirmButton: true,
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                    }).then(() => {
                        this.$router.push(response.data.links.self);
                    });
                })
                .catch(errors => {
                    this.errors = errors.response.data.errors
                });
        }
    }

}
</script>

<style scoped>

</style>

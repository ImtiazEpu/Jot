<template>
<ContactsList endpoint="/api/contacts"></ContactsList>
</template>

<script>
import ContactsList from "../components/ContactsList";
export default {
    name: "ContactsIndex",
    components: {
        ContactsList,
    },

}
</script>

<style scoped>

</style>

<template>
<ContactsList endpoint="/api/birthdays"></ContactsList>
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

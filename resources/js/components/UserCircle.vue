<template>
    <div
        class="rounded-full border border-gray-400 text-white bg-blue-400 w-10 h-10 flex items-center justify-center font-bold">
        {{ UserCircle }}
    </div>
</template>

<script>
export default {
    name: "userCircle",
    props:[
        'name'
    ],
    computed:{
        UserCircle:function (){
            return this.name.match(/[A-Z]/g).slice(0,2).join('');
        }
    }

}
</script>

<style scoped>

</style>

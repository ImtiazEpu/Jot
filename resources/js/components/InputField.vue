<template>
    <div class="relative pb-4">
        <label :for="name"
               class="uppercase text-xs pt-2 font-bold text-blue-600 absolute tracking-wide">{{label}}</label>
        <input :id="name" type="text"
               class="pt-8 text-gray-900 w-full border-b pb-2 focus:outline-none focus:border-blue-400 xl:focus:placeholder-transparent"
               :placeholder="placeholder" :class="errorClassObject()" v-model="value" @input="updateField()"/>
        <p class="text-red-600 text-sm" v-text="errorMessage()"></p>
    </div>
</template>

<script>
    export default {
        name: "InputField",

        props: [
            'name', 'label', 'placeholder','errors', 'data',
        ],
        data:function(){
            return{
                value:''
            }
        },
        computed:{
            hasError: function(){
                return this.errors && this.errors[this.name] && this.errors[this.name].length > 0
            }
        },
        methods:{
            updateField:function () {
                this.clearErrors(this.name)
                this.$emit('update:field', this.value)
            },

            errorMessage:function (){
                if (this.hasError){
                    return this.errors[this.name][0];
                }
            },

            clearErrors:function (){
                if (this.hasError){
                    this.errors[this.name] = null;
                }
            },
            errorClassObject:function (){
                return{
                    'error-field':this.hasError
                }
            },
        },
        watch:{
            data: function (val){
                this.value = val;
            }
        }
    }
</script>

<style scoped>
.error-field{
    @apply .border-red-500 .border-b-2
}
</style>

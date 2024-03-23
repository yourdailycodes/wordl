<script setup>
// import { Head, Link } from '@inertiajs/vue3';

defineProps({
    test : {
        type : String,
    }
});

</script>


<template>
    <span> Variable Is : </span> 
    <b> {{ test }} </b>
</template>

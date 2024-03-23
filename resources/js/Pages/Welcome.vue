<script setup>
// import { Head, Link } from '@inertiajs/vue3';

defineProps({
    totalNumberOfGuesses : {
        type : Number,
        default : 6,
    },
    numberOfLetters : {
        type : Number,
        default : 5,
    },
});

</script>


<template>
    <h1 class="main-title"> Wordl </h1>
    <div class="inputs">
        <div v-for="i in totalNumberOfGuesses" class="input-row">
            <input v-for="j in numberOfLetters" type="text">
        </div>
    </div>
</template>

<script>

export default {
    data() {
        return {
            test : 'HELLO',
            n : 5,
            pi : 3.14
        }
    }
}

</script>



<style lang="scss" scoped>

.main-title {
    font-size: 3rem;
    text-align: center;
    padding: 1rem;
}

.inputs {
    
    padding: 1rem;
    display: flex;
    flex-direction: column;
    gap: 0.75rem;

    .input-row {

        display: flex;
        justify-content: center;
        gap: 0.75rem;

        input {

            width: 4rem;
            height: 4rem;
            font-size: 2rem;
            padding-left: 1.25rem;
            border-width: 0.125rem;
            border-radius: 0.25rem;
            text-transform: uppercase;

        }
    }

}
</style>
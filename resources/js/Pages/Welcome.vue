<script setup>
// import { Head, Link } from '@inertiajs/vue3';

defineProps({
    totalNumberOfGuesses: {
        type: Number,
        default: 6,
    },
    numberOfLetters: {
        type: Number,
        default: 5,
    },
    currentGuess: {
        type: Number,
        default: 1,
    },
})
</script>

<template>
    <h1 class="main-title">Wordl</h1>
    <form class="inputs-form" @submit.prevent="formSubmit">
        <div v-for="i in totalNumberOfGuesses" class="input-row">
            <input
                v-for="j in numberOfLetters"
                type="text"
                @input="typeChar(i, j)"
                :ref="`input-${i}-${j}`"
                maxlength="1"
                v-model="word[`${i}-${j}`]"
                :disabled="currentGuess != i"
                :autofocus="i == currentGuess && j == 1"
            />
        </div>
        <hr />
        <strong class="text-center" v-if="processing"> Please wait... </strong>
        <button type="submit" class="submit-btn" :disabled="processing">SUBMIT</button>
    </form>
</template>

<script>
export default {
    data() {
        return {
            word: {},
            processing : false,
        };
    },
    methods: {
        typeChar(i, j) {
            const currentInput = this.$refs[`input-${i}-${j}`][0]
            if (currentInput.value) {
                this.focusOnAnInput(i, j + 1)
            } else {
                this.focusOnAnInput(i, j - 1)
            }
        },
        focusOnAnInput(i, j) {
            const inputRefs = this.$refs[`input-${i}-${j}`]
            if (inputRefs) {
                const nextInput = inputRefs[0]
                nextInput.focus()
            }
        },
        formSubmit() {
            const address = route("wordl.check")
            const data = this.word
            this.processing = true
            axios.post(address, data).then(res => {
                if(res.data.success){
                    console.log('SUCCESS');
                }else{
                    alert('SOMETHING WENT WRONG')
                }
            }).catch(err => {
                console.log(err);
                alert('SOMETHING WENT WRONG')
            }).finally( () => this.processing = false )
        },
    },
};
</script>

<style lang="scss" scoped>
.main-title {
    font-size: 3rem;
    text-align: center;
    padding: 1rem;
}

.inputs-form {
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

    .submit-btn {
        display: inline-block;
        background-color: lightsalmon;
        border: 0.125rem solid brown;
        color: brown;
        font-weight: bold;
        font-size: 1.25rem;
        padding: 1rem 2rem;
        align-self: center;
        border-radius: 0.5rem;
        transition: all 0.33s;
    }

    .submit-btn:hover {
        background-color: brown;
        color: white;
    }
}
</style>

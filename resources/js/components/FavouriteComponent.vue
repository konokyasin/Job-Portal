<template>
    <div>
        <button v-if="show" @click.prevent="unsave()" class="btn btn-primary w-100 mt-4">UnSave</button>
        <button v-else  @click.prevent="save()" class="btn btn-dark w-100 mt-4">Save</button>
    </div>
</template>

<script>
export default {
    props: ["jobid", "favorited"],
    data(){
        return{
            'show':true
        }
    },
    mounted() {
        this.show = !!this.jobFavorited;
    },
    computed:{
        jobFavorited(){
            return this.favorited
        }
    },
    methods:{
        save(){
            axios.post('/save/' + this.jobid).then(response => this.show = true).catch(error=>alert('error'))
        },
        unsave(){
            axios.post('/unsave/' + this.jobid).then(response => this.show = false).catch(error=>alert('error'))
        }
    }
}
</script>

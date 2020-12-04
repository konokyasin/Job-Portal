<template>
    <div>
        <input type="text" class="form-control" v-model="keyword" placeholder="Search Jobs..."
               v-on:keyup="Searchjobs()">
        <div class="card-footer" v-if="results.length">
            <ul class="list-group">
                <li class="list-group-item" v-for=" result in results">
                    <a style="color: #000;" :href=" '/jobs/' + result.id +'/'+result.slug+'/' ">
                        {{ result.title }}
                        <br>
                        <small class="badge badge-success">{{ result.position }}</small>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
       data(){
           return{
               keyword:'',
               results:[]
           }
       },
        methods:{
            Searchjobs(){
                this.results = [];
                if(this.keyword.length>0){
                    axios.get('/jobs/search', {params:{keyword:this.keyword}}).then(
                        response => {
                            this.results = response.data;
                        }
                    );
                }
            }
        }
    }
</script>

<script type="text/x-template" id="resourcetab">
<div class="row" style="margin-bottom:20px">
        <div class="col-md-2">
            Drewno:{{dane.wood}}
        </div>
        <div class="col-md-2">
            Kamień:{{dane.stone}}
        </div>
        <div class="col-md-2">
            Żelazo:{{dane.iron}}
        </div>
        <div class="col-md-2">
            Złoto:{{dane.gold}}
        </div>
        <div class="col-md-2">
            <button type="button" name="button" @click="updateResources">refresh</button>
        </div>
        <p></p>
    </div>
</script>


<script>

Vue.component('resourcetab', {
    template: '#resourcetab',
    data(){
        return {
        dane:{}
        }
    },
    methods:{
        loadData(context){
            let self = this
             axios.get('/api/readuser.php').then((res)=>{self.dane = res.data; this.$root.dane = this.dane});
         },
         updateResources(context){
             let self = this;
             axios.get('/api/updatestats.php').then((res)=>self.loadData());
         },

    },

    mounted(){
        this.updateResources();
        this.loadData();
    },


});


</script>


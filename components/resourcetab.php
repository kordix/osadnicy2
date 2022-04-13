<script type="text/x-template" id="resourcetab">
<div class="row" style="margin-bottom:20px">
        <div class="col-md-2">
            Drewno:{{$root.dane.wood}}
        </div>
        <div class="col-md-2">
            Kamień:{{$root.dane.stone}}
        </div>
        <div class="col-md-2">
            Żelazo:{{$root.dane.iron}}
        </div>
        <div class="col-md-2">
            Złoto:{{$root.dane.gold}}
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
         updateResources(context){
             let self = this;
             axios.get('/api/updatestats.php').then((res)=>self.$root.loadData());
         },

    },

    mounted(){
        this.updateResources();
        this.$root.loadData();
    },


});


</script>


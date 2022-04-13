<script type="text/x-template" id="wioska">

<div class="" v-if="$root.dane.woodfactor">
<p>Twoja wioska  <span style="display:inline-block;margin-left:20px;color:red" v-if="log !=''" @click="log = ''">{{log}}</span> </p>
<div id="wioska" style="background:url('images/pole.png');background-size:contain;width:500px;height:500px;position:relative">

    <building :attr="'wood'" :left="50" :top="50" :width="100"></building>
            <building :attr="'stone'" :left="200" :top="50" :width="100"></building>
            <building :attr="'iron'" :left="200" :top="200" :width="100"></building>
            <!-- <magazyn :attr="'wood'" :left="50" :top="350" :width="90"></magazyn>
            <magazyn :attr="'stone'" :left="150" :top="350" :width="90"></magazyn>
            <magazyn :attr="'iron'" :left="250" :top="350" :width="90"></magazyn> -->

</div>

<p>Tartak:<span style="font-size:20px" v-for="(level,index) in dane.woodLevel">•</span><span>
            Produkcja: {{$root.dane.woodfactor * 3600 }}/h</span>
            <button @click="upgrade('wood')">Upgrade ({{$root.costs.woodUpgrade[0]}}D {{$root.costs.woodUpgrade[1]}}K {{$root.costs.woodUpgrade[2]}}Ż)</button>
        </p>
        <p>Kamieniołom:<span style="font-size:20px" v-for="(level,index) in dane.stoneLevel">•</span>
            <span>Produkcja: {{$root.dane.stonefactor * 3600}}/h </span>
            <button @click="upgrade('stone')" >Upgrade  ({{$root.costs.stoneUpgrade[0]}}D {{$root.costs.stoneUpgrade[1]}}K {{$root.costs.stoneUpgrade[2]}}Ż)</button>
        </p>
        <p>Kopalnia rudy:<span style="font-size:20px" v-for="(level,index) in dane.ironLevel">•</span>
            <span>Produkcja: {{$root.dane.ironfactor * 3600}}/h </span>
            <button @click="upgrade('iron')" >Upgrade  ({{$root.costs.ironUpgrade[0]}}D {{$root.costs.ironUpgrade[1]}}K {{$root.costs.ironUpgrade[2]}}Ż)</button>
        </p>
        </p>
        <p>Magazyn drewna: Max {{$root.dane.woodStore * 100 +200}} <button type="button" name="button" @click="upgradeMag('wood')">Upgrade</button><span style="font-size:10px"> Upgrade magazynów 100 każdego surowca </span></p>
        <p>Magazyn kamienia: Max {{$root.dane.stoneStore * 100 +200}} <button type="button" name="button" @click="upgradeMag('stone')">Upgrade</button> </p>
        <p>Magazyn rudy: Max {{$root.dane.ironStore * 100 +200}} <button type="button" name="button" @click="upgradeMag('iron')">Upgrade</button> </p>

</div>
</script>



<script>
    Vue.component('wioska', {
        template:'#wioska',
        data(){
        return {
            dane:this.$root.dane,
            costs:this.$root.costs,
            log:''
        }},
        mounted(){

        },
        methods:{
            upgradeMag(res){
                let self = this;

                let levelcalc=this.$root.dane[res+'Store']+1;

                if(this.pay(100,100,100)==false){
                    console.log('działa zwrot');
                    return
                }

                axios.post('api/update.php',{id:this.$root.dane.id,tabela:'stats', dane:{[res+'Store']:levelcalc}}).then((res)=>self.$root.loadData());

            },
            upgrade(mine){
                let self = this;
                let kosztwood = this.$root.costs[mine+'Upgrade'][0];
                let kosztstone = this.$root.costs[mine+'Upgrade'][1];
                let kosztiron = this.$root.costs[mine+'Upgrade'][2];
                if(this.pay(kosztwood,kosztstone,kosztiron)==false){
                    return
                }

                let levelcalc = this.$root.dane[mine+'Level']+1;
                let factorcalc = levelcalc * 0.01;

                axios.post('/api/update.php',{tabela:'stats',id:self.$root.dane.id, dane:{[mine+'Level']:levelcalc,[mine+'factor']:factorcalc}}).then((res)=>console.log('puszczony upgrade')).then((res)=>self.$root.loadData());
            },
            refresh(){
                // let self = this;
                // console.log('puszczamy update');
                // axios.patch('update').then((res)=>console.log('update ukończony')).then((res)=>self.getData());
            },
       
            pay(woodcost,stonecost,ironcost){
                if(this.$root.dane.wood < woodcost){
                    this.log='Brakuje ci drewna';
                    return false
                }
                if(this.$root.dane.stone < stonecost){
                    this.log = 'Brakuje ci kamienia';

                    return false
                }
                if(this.$root.dane.iron < ironcost){
                    this.log = 'Brakuje ci żelaza' ;

                    return false
                }

                let woodcalc = this.$root.dane.wood - woodcost;
                let stonecalc = this.$root.dane.stone - stonecost;
                let ironcalc = this.$root.dane.iron - ironcost;
                axios.post('api/update.php',{id:this.$root.dane.id,tabela:'stats',dane:{wood:woodcalc,stone:stonecalc,iron:ironcalc}}).then((res)=>console.log('zapłacono'));
            }
    
        }
    });

    </script>
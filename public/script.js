let app = new Vue({
    data:{
        dane:{},
        wylogujshow:false,
        costs: {
            woodUpgrade: [150, 100, 100],
            ironUpgrade: [150, 100, 100],
            stoneUpgrade: [100, 100, 100],
        },
    },
    el:'#app',
    methods:{

        loadData(){
            let self = this
             axios.get('/api/readuser.php').then((res)=>{self.dane = res.data; this.$root.dane = this.dane});
         },
        resHack(){
            // this.$store.commit('resHack');
            this.$root.dane.wood = 500;
            this.$root.dane.stone = 500;
            this.$root.dane.iron = 500;

            this.checkMax();


        },
        checkMax(){
            let self = this;
            let resources=['wood','stone','iron'];
            for(let i=0;i<resources.length;i++){
                let operand = resources[i];
                let max = self.dane[operand+'Store']*100+200;

                if (self.dane[operand] > max){
                    self.dane[operand]=max;
                }

            }
        },
   
    }
})
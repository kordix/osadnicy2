<script type="text/x-template" id="appp">
    <input type="text" v-model="$root.obiekt.dane.imie">
</script>


<script>
    Vue.component('app', {
        template: '#appp',
        data() {
            return {
                test: 'siemano'
            }
        }
    })
</script>
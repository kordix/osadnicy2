<?php
session_start();

if(isset($_SESSION['zalogowany'])){
    header('location:/');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaloguj</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body style="margin-top:20px">


<div id="app" class="container">
<p>Witaj wędrowcze. Zaloguj się lub <a href="/register.php">zarejestruj</a></p>

<label for="">Login</label>
<input type="text" v-model="login">
<label for="">Haslo</label>
<input type="password" v-model="password">

<button @click="zaloguj">Zaloguj</button>

<p><b>{{error}}</b></p>



</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>

<script>
let app = new Vue({
    el:'#app',
    data:{
        login:'',
        password:'',
        error:''
    },
    methods:{
        zaloguj(){
            let self = this;
            axios.post('api/zaloguj.php',{login:this.login,password:this.password}).then((res)=>{
                console.log(res.data.length);

              

                if(res.data.length == 12){
                    console.log('JOŁ JOŁ ZALOGOWANY');
                    location.reload();
                }else{
                    self.error = 'Zły login lub hasło';
                }
            })
        }
    }
})

</script>
</body>
</html>
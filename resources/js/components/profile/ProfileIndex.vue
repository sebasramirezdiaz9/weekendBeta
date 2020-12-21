<template>
    <div>
        <div class="row">
             <div class="col-md-2">
                <div class="form-group">
                     <img width="200" src="https://static.thenounproject.com/png/17241-200.png" alt="">
                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group">
                     <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" :value="profile.name" disabled>   
                    <br>
                    <label for="email">Correo Electrónico</label>
                    <input type="text" class="form-control" id="email" :value="profile.email" disabled> 
                    <br>
                     <label for="email">Lugares Favoritos</label>
                    <input type="text" class="form-control" id="email" :value="profile.favorites_places" disabled> 
                    <br>
                </div>
            </div>
        </div>
    </div>
    
        
</template>
<script>
    export default {
        data() {
            return {
                profile: {},
            }
        },
    
        created() {
            axios.get(this.$route('get.data')).then(response => {
               this.profile = response.data;
            });
         
        },
    }
</script>

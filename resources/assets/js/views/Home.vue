<template>
    <div>
        <div class="container-fluid hero-section d-flex align-content-center justify-content-center flex-wrap ml-auto background-img">
            <h2 class="title">Welcome to the Camera Rental</h2>
            
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4 product-box" v-for="(product,index) in products" @key="index">
                            <router-link :to="{ path: '/products/'+product.id}">
                                <img :src="product.image" :alt="product.name">
                                <h5><span v-html="product.name"></span>
                                    <span class="small-text text-muted float-right">Rp {{product.price}}</span>
                                </h5>
                                <button class="col-md-4 btn btn-sm btn-primary float-right">Book Now</button>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                products : []
            }
        },
        mounted(){
            axios.get("api/products/")
            .then(response => {
                this.products = response.data
            })
            .catch(error => {
                console.error(error);
            })       
        }
    }
</script>
<style scoped>
    .small-text {
        font-size: 14px;
    }
    .product-box {
        border: 1px solid #cccccc;
        padding: 10px 15px;
    }
    .hero-section {
        height: 30vh;
        background: #ababab;
        align-items: center;
        margin-bottom: 20px;
        margin-top: -20px;
    }
    .title {
        font-size: 60px;
        color: #ffffff;
    }
    .background-img {
        background-image: url("https://i.ibb.co/JK48FBh/bradcam3.png");
        background-repeat: no-repeat;
        background-size: 100%
    }
</style>
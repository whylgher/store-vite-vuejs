<template>
    <div class="container">
        <div class="row mb-md-5 mb-4 mx-n2">
            <div class="col-lg-3 col-6 product-block mb-4 px-2" v-for="product in products" :key="product.id">

                <a :href="'/product/' + product.id">
                    <img class="img-fluid img-portfolio img-hover mb-3" :src="product.photo" :alt="product.details">
                </a>

                <div class="caption">
                    <h3 class="page-header">{{ product.name }}</h3>
                    <div class="price-mob mb-2">
                        ${{ product.price }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue';

export default {
    name: 'Products',
    data() {
        return {
            products: ref([]),
        }
    },
    mounted() {
        this.getAllProducts();
    },
    methods: {
        getAllProducts() {
            var page = '/api/v1/product';
            axios.get(page)
                .then(
                    ({ data }) => {
                        this.products = data['products'];
                    }
                )
        },
        showProduct(id) {
            this.router.push('/product/' + id);
        },
    }
}
</script>

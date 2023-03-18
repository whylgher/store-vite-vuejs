<template>
    <div class="container">
        <div>
            <div class="row">
                <div class="col-12">
                    <h1 class="page-header">{{ product.name }}</h1>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="main-product-image">
                        <img :src="baseUrl + '/' + product.photo" :alt="product.details">
                    </div>
                </div>
                <div class="col-lg-6">
                    <form class="form-horizontal">
                        <div class="form-group price_elem row">
                            <label class="col-sm-3 col-md-3 form-control-label nopaddingtop">Price:</label>
                            <div class="col-sm-8 col-md-9">
                                <span class="product-form-price" id="product-form-price">${{ product.price }}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Quantity" class="col-sm-3 col-md-3 form-control-label">Quantity:</label>
                            <div class="col-sm-8 col-md-9">
                                <input type="number" class="qty form-control" id="input-qty" name="qty" maxlength="5"
                                    value="1">
                            </div>
                        </div>

                        <div class="form-group product-stock product-available row visible">
                            <label class="col-sm-3 col-md-3 form-control-label"></label>
                            <div class="col-sm-8 col-sm-offset-3 col-md-9 col-md-offset-3">
                                <input type="submit" class="adc btn btn-primary" value="Add to Shopping Cart">
                                <a href="javascript:history.back()" class="btn btn-link btn-sm" title="Continue Shopping">←
                                    Continue Shopping</a>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-md-3 form-control-label">Description:</label>
                            <div class="col-sm-8 col-md-9 description">
                                <p>{{ product.description }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-md-3 form-control-label">Details:</label>
                            <div class="col-sm-9 col-md-9">

                                <p>{{ product.details }}</p>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue';

export default {
    name: 'Product',
    props: ['id'],
    data() {
        return {
            baseUrl: window.location.origin,
            product: ref([]),
        }
    },
    mounted() {
        this.getItem();
    },
    methods: {
        getItem() {
            var page = `/api/v1/product/${this.id}`;
            axios.get(page)
                .then(
                    ({ data }) => {
                        this.product = data['product'];
                    }
                )
        }
    }
}
</script>

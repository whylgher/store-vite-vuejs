<template >
    <div>
        <div class="card-body p-4">
            <div class="row">
                <div class="col-lg-7">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <p class="mb-1">Shopping cart</p>
                            <router-link to="/">←
                                Continue Shopping</router-link>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div v-for="product in products" class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                    <div>
                                        <img :src="product.product.photo" class="img-fluid rounded-3" alt="Shopping item"
                                            style="width: 65px;">
                                    </div>
                                    <div class="ms-3">
                                        <h5>{{ product.product.name }}</h5>
                                        <p class="small mb-0">{{ product.product.details }}</p>
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center">
                                    <div style="width: 50px;">
                                        <h5 class="fw-normal mb-0">{{ product.product.quanty }}</h5>
                                    </div>
                                    <div style="width: 80px;">
                                        <h5 class="mb-0">{{ product.product.price * product.product.quanty }}€</h5>
                                    </div>
                                    <a href="#!" style="color: rgb(206, 206, 206); --darkreader-inline-color:#c9c4bd;"
                                        data-darkreader-inline-color=""><i class="fas fa-trash-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="card bg-primary text-white rounded-3">
                        <div class="card-body">
                            <hr class="my-4">

                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Subtotal</p>
                                <p class="mb-2">{{ total }}€</p>
                            </div>

                            <div class="d-flex justify-content-between mb-4">
                                <p class="mb-2">Total(Incl. taxes)</p>
                                <p class="mb-2">{{ total }}€</p>
                            </div>

                            <button type="button" class="btn btn-info btn-block btn-lg">
                                <div class="d-flex justify-content-between">
                                    <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                </div>
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    data() {
        return {
            products: [],
            total: 0,
        };
    },
    mounted() {
        this.getItems();
    },
    methods: {
        getItems() {
            axios.get('api/v1/cart')
                .then(
                    ({ data }) => {
                        let listProducts = data.products;
                        for (var index in listProducts) {
                            console.log(listProducts[index].product_id)
                            this.getProduct(listProducts[index].product_id, listProducts[index].quantity)
                        }
                    }
                )
        },
        getProduct(id, qt) {
            axios.get('api/v1/product/' + id)
                .then(
                    ({ data }) => {
                        data.product.quanty = qt;
                        this.products.push(data);
                        this.calcTotal(data.product.price, qt);
                    },
                );
        },
        calcTotal(value, qt) {
            this.total = this.total + (value * qt)
        },
    },
}
</script>
